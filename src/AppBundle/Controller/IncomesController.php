<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Incomes;
use AppBundle\Form\IncomesType;

/**
 * Incomes controller.
 *
 * @Route("/incomes")
 */
class IncomesController extends Controller
{
    /**
     * Lists all Incomes entities.
     *
     * @Route("/", name="incomes_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $incomes = $em->getRepository('AppBundle:Incomes')->findAll();

        return $this->render('incomes/index.html.twig', array(
            'incomes' => $incomes,
        ));
    }

    /**
     * Creates a new Incomes entity.
     *
     * @Route("/new", name="incomes_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $income = new Incomes();
        $form = $this->createForm('AppBundle\Form\IncomesType', $income);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($income);
            $em->flush();

            return $this->redirectToRoute('incomes_show', array('id' => $income->id));
        }

        return $this->render('incomes/new.html.twig', array(
            'income' => $income,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Incomes entity.
     *
     * @Route("/{id}", name="incomes_show")
     * @Method("GET")
     */
    public function showAction(Incomes $income)
    {
        $deleteForm = $this->createDeleteForm($income);

        return $this->render('incomes/show.html.twig', array(
            'income' => $income,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Incomes entity.
     *
     * @Route("/{id}/edit", name="incomes_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Incomes $income)
    {
        $deleteForm = $this->createDeleteForm($income);
        $editForm = $this->createForm('AppBundle\Form\IncomesType', $income);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($income);
            $em->flush();

            return $this->redirectToRoute('incomes_edit', array('id' => $income->id));
        }

        return $this->render('incomes/edit.html.twig', array(
            'income' => $income,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Incomes entity.
     *
     * @Route("/{id}", name="incomes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Incomes $income)
    {
        $form = $this->createDeleteForm($income);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($income);
            $em->flush();
        }

        return $this->redirectToRoute('incomes_index');
    }

    /**
     * Creates a form to delete a Incomes entity.
     *
     * @param Incomes $income The Incomes entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Incomes $income)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('incomes_delete', array('id' => $income->id)))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
