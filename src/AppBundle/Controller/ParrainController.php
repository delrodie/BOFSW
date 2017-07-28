<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Parrain;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Parrain controller.
 *
 * @Route("admin/parrain")
 */
class ParrainController extends Controller
{
    /**
     * Lists all parrain entities.
     *
     * @Route("/", name="admin_parrain_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $parrains = $em->getRepository('AppBundle:Parrain')->findAll();

        return $this->render('parrain/index.html.twig', array(
            'parrains' => $parrains,
        ));
    }

    /**
     * Creates a new parrain entity.
     *
     * @Route("/new", name="admin_parrain_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $parrain = new Parrain();
        $form = $this->createForm('AppBundle\Form\ParrainType', $parrain);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($parrain);
            $em->flush();

            return $this->redirectToRoute('admin_parrain_show', array('id' => $parrain->getId()));
        }

        return $this->render('parrain/new.html.twig', array(
            'parrain' => $parrain,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a parrain entity.
     *
     * @Route("/{id}", name="admin_parrain_show")
     * @Method("GET")
     */
    public function showAction(Parrain $parrain)
    {
        $deleteForm = $this->createDeleteForm($parrain);

        return $this->render('parrain/show.html.twig', array(
            'parrain' => $parrain,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing parrain entity.
     *
     * @Route("/{id}/edit", name="admin_parrain_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Parrain $parrain)
    {
        $deleteForm = $this->createDeleteForm($parrain);
        $editForm = $this->createForm('AppBundle\Form\ParrainType', $parrain);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_parrain_index');
        }

        return $this->render('parrain/edit.html.twig', array(
            'parrain' => $parrain,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a parrain entity.
     *
     * @Route("/{id}", name="admin_parrain_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Parrain $parrain)
    {
        $form = $this->createDeleteForm($parrain);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($parrain);
            $em->flush();
        }

        return $this->redirectToRoute('admin_parrain_index');
    }

    /**
     * Creates a form to delete a parrain entity.
     *
     * @param Parrain $parrain The parrain entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Parrain $parrain)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_parrain_delete', array('id' => $parrain->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
