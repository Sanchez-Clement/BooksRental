<?php

namespace LibraryManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use LibraryManagerBundle\Entity\Book;
use LibraryManagerBundle\Entity\Member;

class DefaultController extends Controller
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
        return $this->render('LibraryManagerBundle:Default:index.html.twig',compact('books'));
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
        return $this->render('LibraryManagerBundle:Default:viewBook.html.twig',compact('book'));

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
        return $this->render('LibraryManagerBundle:Default:viewCategory.html.twig',compact('books'));

    }

    /**
     * @Route(
     *     path = "/members",
     *     name = "library_members")
     */
    public function viewMembersAction()
    {
        $em = $this->getDoctrine()->getManager();
        $members = $em -> getRepository(Member::class)->findAll();
        return $this->render('LibraryManagerBundle:Default:viewMembers.html.twig',compact('members'));
    }


    
}
