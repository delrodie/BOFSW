<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Difficulte;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Difficulte controller.
 *
 * @Route("admin/difficulte")
 */
class DifficulteController extends Controller
{
    /**
     * Lists all difficulte entities.
     *
     * @Route("/", name="admin_difficulte_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $difficultes = $em->getRepository('AppBundle:Difficulte')->findAll();

        return $this->render('difficulte/index.html.twig', array(
            'difficultes' => $difficultes,
        ));
    }

    /**
     * Creates a new difficulte entity.
     *
     * @Route("/new", name="admin_difficulte_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $difficulte = new Difficulte();
        $form = $this->createForm('AppBundle\Form\DifficulteType', $difficulte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($difficulte);
            $em->flush();

            return $this->redirectToRoute('admin_difficulte_show', array('id' => $difficulte->getId()));
        }

        return $this->render('difficulte/new.html.twig', array(
            'difficulte' => $difficulte,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a difficulte entity.
     *
     * @Route("/{id}", name="admin_difficulte_show")
     * @Method("GET")
     */
    public function showAction(Difficulte $difficulte)
    {
        $deleteForm = $this->createDeleteForm($difficulte);

        $em = $this->getDoctrine()->getManager();

        $resultat = $em->getRepository('AppBundle:Resultat')->findOneBy(array('id' => $difficulte->getResultat()->getid()));
        $eleve = $em->getRepository('AppBundle:Eleve')->findOneBy(array('id' => $resultat->getEleve()->getid()));

        return $this->render('difficulte/show.html.twig', array(
            'resultat' => $resultat,
            'eleve' => $eleve,
            'difficulte' => $difficulte,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing difficulte entity.
     *
     * @Route("/{id}/edit", name="admin_difficulte_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Difficulte $difficulte)
    {
        $deleteForm = $this->createDeleteForm($difficulte);
        $editForm = $this->createForm('AppBundle\Form\DifficulteType', $difficulte);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_difficulte_edit', array('id' => $difficulte->getId()));
        }

        return $this->render('difficulte/edit.html.twig', array(
            'difficulte' => $difficulte,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a difficulte entity.
     *
     * @Route("/{id}", name="admin_difficulte_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Difficulte $difficulte)
    {
        $form = $this->createDeleteForm($difficulte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($difficulte);
            $em->flush();
        }

        return $this->redirectToRoute('admin_difficulte_index');
    }

    /**
     * Creates a form to delete a difficulte entity.
     *
     * @param Difficulte $difficulte The difficulte entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Difficulte $difficulte)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_difficulte_delete', array('id' => $difficulte->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
