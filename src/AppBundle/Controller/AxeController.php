<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Axe;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Axe controller.
 *
 * @Route("admin/axe")
 */
class AxeController extends Controller
{
    /**
     * Lists all axe entities.
     *
     * @Route("/", name="admin_axe_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $axes = $em->getRepository('AppBundle:Axe')->findAll();

        return $this->render('axe/index.html.twig', array(
            'axes' => $axes,
        ));
    }

    /**
     * Creates a new axe entity.
     *
     * @Route("/new", name="admin_axe_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $axe = new Axe();
        $form = $this->createForm('AppBundle\Form\AxeType', $axe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($axe);
            $em->flush();

            return $this->redirectToRoute('admin_axe_index');
        }

        return $this->render('axe/new.html.twig', array(
            'axe' => $axe,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a axe entity.
     *
     * @Route("/{slug}", name="admin_axe_show")
     * @Method("GET")
     */
    public function showAction(Axe $axe)
    {
        $deleteForm = $this->createDeleteForm($axe);

        return $this->render('axe/show.html.twig', array(
            'axe' => $axe,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing axe entity.
     *
     * @Route("/{slug}/edit", name="admin_axe_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Axe $axe)
    {
        $deleteForm = $this->createDeleteForm($axe);
        $editForm = $this->createForm('AppBundle\Form\AxeType', $axe);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_axe_index');
        }

        return $this->render('axe/edit.html.twig', array(
            'axe' => $axe,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a axe entity.
     *
     * @Route("/{id}", name="admin_axe_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Axe $axe)
    {
        $form = $this->createDeleteForm($axe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($axe);
            $em->flush();
        }

        return $this->redirectToRoute('admin_axe_index');
    }

    /**
     * Creates a form to delete a axe entity.
     *
     * @param Axe $axe The axe entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Axe $axe)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_axe_delete', array('id' => $axe->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
