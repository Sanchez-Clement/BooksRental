<?php

namespace LibraryManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use LibraryManagerBundle\Entity\Book;
use LibraryManagerBundle\Entity\Member;

class MembersController extends Controller
{
    

    /**
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
     * @Route(
     *     path = "/members/{id}",
     *     name = "library_thisMember",
     *     requirements={"id": "\d+"})
     */
    public function viewMember($id)
    {
        $em = $this->getDoctrine()->getManager();
        $member = $em -> getRepository(Member::class)->find($id);
        return $this->render('LibraryManagerBundle:Members:viewThisMember.html.twig', compact('member'));
    }
}
