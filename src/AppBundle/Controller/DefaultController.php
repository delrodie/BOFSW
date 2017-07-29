<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/maintenance.html.twig');
    }

    /**
     * @Route("/accueil", name="accueil")
     */
    public function accueilAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/resultat-difficulte/{id}", name="resultat_difficulte")
     */
    public function difficulteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $difficulte = $em->getRepository('AppBundle:Difficulte')->findOneBy(array('resultat' => $id));

        return $this->render('default/difficulte.html.twig', array(
            'difficulte'  => $difficulte,
        ));
    }
}
