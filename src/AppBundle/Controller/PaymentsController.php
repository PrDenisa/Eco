<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Payments;
use AppBundle\Form\PaymentsType;

/**
 * Payments controller.
 *
 * @Route("/payments")
 */
class PaymentsController extends Controller
{
    /**
     * Lists all Payments entities.
     *
     * @Route("/", name="payments_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $payments = $em->getRepository('AppBundle:Payments')->findAll();

        return $this->render('payments/index.html.twig', array(
            'payments' => $payments,
        ));
    }

    /**
     * Creates a new Payments entity.
     *
     * @Route("/new", name="payments_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $payment = new Payments();
        $form = $this->createForm('AppBundle\Form\PaymentsType', $payment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($payment);
            $em->flush();

            return $this->redirectToRoute('payments_show', array('id' => $payment->id));
        }

        return $this->render('payments/new.html.twig', array(
            'payment' => $payment,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Payments entity.
     *
     * @Route("/{id}", name="payments_show")
     * @Method("GET")
     */
    public function showAction(Payments $payment)
    {
        $deleteForm = $this->createDeleteForm($payment);

        return $this->render('payments/show.html.twig', array(
            'payment' => $payment,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Payments entity.
     *
     * @Route("/{id}/edit", name="payments_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Payments $payment)
    {
        $deleteForm = $this->createDeleteForm($payment);
        $editForm = $this->createForm('AppBundle\Form\PaymentsType', $payment);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($payment);
            $em->flush();

            return $this->redirectToRoute('payments_edit', array('id' => $payment->id));
        }

        return $this->render('payments/edit.html.twig', array(
            'payment' => $payment,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Payments entity.
     *
     * @Route("/{id}", name="payments_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Payments $payment)
    {
        $form = $this->createDeleteForm($payment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($payment);
            $em->flush();
        }

        return $this->redirectToRoute('payments_index');
    }

    /**
     * Creates a form to delete a Payments entity.
     *
     * @param Payments $payment The Payments entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Payments $payment)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('payments_delete', array('id' => $payment->id)))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
