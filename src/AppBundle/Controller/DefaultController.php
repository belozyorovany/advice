<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\FAQ;

class DefaultController extends Controller {
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request) {
        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:FAQ');

        $query = $repository->createQueryBuilder('f')
            ->orderBy('f.weight', 'ASC')
            ->getQuery();

        $aFAQ = $query->getResult();


        return $this->render('AppBundle:default:index.html.twig',
            array(
                'FAQ' => $aFAQ
            )
        );
    }
}
