<?php

namespace LibraryManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use LibraryManagerBundle\Entity\Book;
use LibraryManagerBundle\Entity\Member;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MembersController extends Controller
{
    

    /**
     * list all the member in bdd
     * @Route(
     *     path = "/members",
     *     name = "library_members")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $members = $em -> getRepository(Member::class)->findAll();
        return $this->render('LibraryManagerBundle:Members:viewMembers.html.twig', compact('members'));
    }

    /**
     * view the detail of the member selectionned
     * @Route(
     *     path = "/members/{id}",
     *     name = "library_thisMember",
     *     requirements={"id": "\d+"})
     */
    public function viewMember($id)
    {
        $em = $this->getDoctrine()->getManager();
        $member = $em -> getRepository(Member::class)->find($id);
        // if the id doesn't exist 
        if (null === $member) {
            throw new NotFoundHttpException("Le membre d'id ".$id." n'existe pas.");
          }
        return $this->render('LibraryManagerBundle:Members:viewThisMember.html.twig', compact('member'));
    }
}
