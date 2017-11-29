<?php

namespace LibraryManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use LibraryManagerBundle\Entity\Book;

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
     *     path = "/book/{id}",
     *     name="library_viewBook" ,
     *     requirements={"id": "\d+"})
     */
    public function viewBook($id)
    {
        $em = $this->getDoctrine()->getManager();
        $book = $em -> getRepository(Book::class)->find($id);
        return $this->render('LibraryManagerBundle:Default:viewBook.html.twig',compact('book'));

    }
}
