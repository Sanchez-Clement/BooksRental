<?php

namespace LibraryManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use LibraryManagerBundle\Entity\Book;
use LibraryManagerBundle\Entity\Member;
use LibraryManagerBundle\Form\BookType;
use LibraryManagerBundle\Form\MemberType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BooksController extends Controller
{
    /**
     * @Route(
     *     path = "/",
     *     name = "library_index")
     */
    public function indexAction()
    {
        
        $em = $this->getDoctrine()->getManager();
        $books = $em -> getRepository(Book::class)->findAll();
        return $this->render('LibraryManagerBundle:Books:index.html.twig',compact('books'));
    }

    /**
     * @Route(
     *     path = "home/book/{id}",
     *     name="library_viewBook" ,
     *     requirements={"id": "\d+"})
     */
    public function viewBook($id)
    {
        $em = $this->getDoctrine()->getManager();
        $book = $em -> getRepository(Book::class)->find($id);
        return $this->render('LibraryManagerBundle:Books:viewBook.html.twig',compact('book'));

    }

      /**
     * @Route(
     *     path = "home/{category}",
     *     name="library_viewCategory")
     */
    public function viewCategory($category)
    {
        $em = $this->getDoctrine()->getManager();
        $books = $em -> getRepository(Book::class)->findByCategory($category);
        return $this->render('LibraryManagerBundle:Books:viewCategory.html.twig',compact('books'));

    }

    /**
     * @Route(
     *     path = "home/book/{id}/rental",
     *     name="library_rental" ,
     *     requirements={"id": "\d+"})
     */
    public function rentalBook($id,Request $request)
    {
        
        $em = $this->getDoctrine()->getManager()-> getRepository(Book::class);
        $book = $em->find($id);
        $member = new Member();
       
        $form = $this->createForm(MemberType::class, $member);
        

       
      
        $form->handleRequest($request);
        if ($request->isMethod('POST')) {

            // dump($_POST);
           $em = $this->getDoctrine()->getManager();
           $member = $em-> getRepository(Member::class)->findOneByNumberMember($_POST['librarymanagerbundle_member']['numberMember']);
           $book->setMember($member);
           $book->setAvailability(0);


            
           $this->getDoctrine()->getManager()->flush();
            // Inutile de persister ici, Doctrine connait déjà notre annonce
            // $em2 ->persist($book);
          
      
            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifiée.');
      
            return $this->redirectToRoute('library_thisMember',array(
                'id' => $member->getId()
            ));
          } 

            $form = $form->createView();
            
            
               return $this->render('LibraryManagerBundle:Books:rentalBook.html.twig',compact('book','form'));
          
          
        

    }

     /**
     * @Route(
     *     path = "home/book/{id}/back",
     *     name="library_back" ,
     *     requirements={"id": "\d+"})
     */
    public function backBook($id)
    {
        $em = $this->getDoctrine()->getManager()-> getRepository(Book::class);
        $book = $em->find($id);
        $book->setMember();
        $book->setAvailability(1);
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('library_viewBook',array(
            'id' => $book->getId()
        ));

    }
    
    
}
