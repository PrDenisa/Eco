<?php
/**
 * Created by PhpStorm.
 * User: denisa
 * Date: 02.02.2016
 * Time: 16:45
 */

namespace AppBundle\Controller;


use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AdminController
 *
 * @Route("/admin")
 */
class AdminController extends Controller
{
    /**
     * @Route("/", name="adminHomepage")
     */
    public function indexAction(Request $request)
    {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:User');
        $users = $repository->findAll();

        return $this->render('admin/index.html.twig', ['users' => $users]);
    }

    /**
     * @Route("/edit/{id}", name="user-edit")
     */
    public function editUserAction(Request $request, User $user)
    {
        $deleteForm = $this->createDeleteForm($user);
        $editForm = $this->createForm('AppBundle\Form\UserType', $user);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('user-edit', array('id' => $user->getId()));
        }

        return $this->render('admin/edit.html.twig', array(
            'user' => $user,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @Route("/delete/{id}", name="user-delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, User $user)
    {
        $form = $this->createDeleteForm($user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
        }

        return $this->redirectToRoute('adminHomepage');
    }

    /**
     * Creates a form to delete a User entity.
     *
     * @param User $user The User entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(User $user)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user-delete', array('id' => $user->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}