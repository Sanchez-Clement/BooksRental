<?php

namespace LibraryManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use LibraryManagerBundle\Entity\Book;
use LibraryManagerBundle\Entity\Member;
use LibraryManagerBundle\Form\BookType;
use LibraryManagerBundle\Form\MemberType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BooksController extends Controller
{
    /**
     * List all the books in bdd
     * @Route(
     *     path = "/",
     *     name = "library_index")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $books = $em -> getRepository(Book::class)->findAll();
        return $this->render('LibraryManagerBundle:Books:index.html.twig', compact('books'));
    }

    /**
     * add a book in bdd
     * @Route(
     *     path = "home/addbook",
     *     name="library_addBook")
     */
    public function addBook(Request $request)
    {
      
        $book = new Book();
      
        // Create form BOOK
        $form = $this->createForm(BookType::class, $book);
       

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            
                        
                        $em = $this->getDoctrine()->getManager();

                        // Make the book available
                        $book -> setAvailability(1);
                        $em -> persist($book);

                        // add the book in the bdd
                        $this->getDoctrine()->getManager()->flush();

                      
                //   message flash
                        $request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifiée.');
                  
                        return $this->redirectToRoute('library_viewBook', array(
                            'id' => $book->getId()
                        ));
                    }
        
        $form = $form->createView();
        return $this->render('LibraryManagerBundle:Books:addBook.html.twig', compact('form'));
    }

    /**
     * view the detail of the sellectionned book
     * @Route(
     *     path = "home/book/{id}",
     *     name="library_viewBook" ,
     *     requirements={"id": "\d+"})
     */
    public function viewBookAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $book = $em -> getRepository(Book::class)->find($id);
        return $this->render('LibraryManagerBundle:Books:viewBook.html.twig', compact('book'));
    }

    /**
     * 
     * @Route(
     *     path = "home/{category}",
     *     name="library_viewCategory")
     */
    public function viewCategoryAction($category)
    {
        $em = $this->getDoctrine()->getManager();
        $books = $em -> getRepository(Book::class)->findByCategory($category);
        return $this->render('LibraryManagerBundle:Books:viewCategory.html.twig', compact('books','category'));
    }

    /**
     * to rent a book
     * @Route(
     *     path = "home/book/{id}/rental",
     *     name="library_rental" ,
     *     requirements={"id": "\d+"})
     */
    public function rentalBookAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager()-> getRepository(Book::class);
        $book = $em->find($id);
        $member = new Member();


    //    create a form to member
        $form = $this->createForm(MemberType::class, $member);
        

       
    
        if ($request->isMethod('POST') && $form->handleRequest($request)->isvalid()) {

            
            $em = $this->getDoctrine()->getManager();

            // search if the number member is in bdd
            $member = $em-> getRepository(Member::class)->findOneByNumberMember($_POST['librarymanagerbundle_member']['numberMember']);

            if (isset($member)) {

                // add the member to the entity book
                $book->setMember($member);

                // make no available the book
                $book->setAvailability(0);

                $this->getDoctrine()->getManager()->flush();
               
        //   message flash
                $request->getSession()->getFlashBag()->add('notice', 'Votre livre a bien été emprunté.');
      
                return $this->redirectToRoute('library_thisMember', array(
                'id' => $member->getId()
            ));
            } else {
                // message flash if the number member is not in bdd
                $request->getSession()->getFlashBag()->add('danger', 'Numéro de membre inconnu');
            }
        }

        $form = $form->createView();
            
            
            
        return $this->render('LibraryManagerBundle:Books:rentalBook.html.twig', compact('book', 'form'));
    }

    /**
    * to back the book
    * @Route(
    *     path = "home/book/{id}/back",
    *     name="library_back" ,
    *     requirements={"id": "\d+"})
    */
    public function backBookAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager()-> getRepository(Book::class);
        $book = $em->find($id);

        // reset the member of the book
        $book->setMember();

        // make the book available
        $book->setAvailability(1);
        $this->getDoctrine()->getManager()->flush();

        // message flash
        $request->getSession()->getFlashBag()->add('notice', 'Votre livre a bien été rendu.');

        return $this->redirectToRoute('library_viewBook', array(
            'id' => $book->getId()
        ));
    }

  
}
