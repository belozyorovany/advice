<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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

        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Line');

        $query = $repository->createQueryBuilder('l')
            ->orderBy('l.weight', 'ASC')
            ->getQuery();

        $aLine = $query->getResult();

        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:CaseArea');

        $query = $repository->createQueryBuilder('ca')
            ->orderBy('ca.weight', 'ASC')
            ->getQuery();

        $aCaseArea = $query->getResult();

        return $this->render('AppBundle:default:index.html.twig',
            array(
                'FAQ' => $aFAQ,
                'Lines' => $aLine,
                'CaseAreas' => $aCaseArea
            )
        );
    }

    /**
     * @Route("/case-area/{id}", name="caseArea")
     *
     * @param $id integer
     */
    public function caseAreaAction($id) {
        $caseArea = $this->getDoctrine()
            ->getRepository('AppBundle:CaseArea')
            ->find($id);

        return $this->render('AppBundle:default:caseArea.html.twig',
            array(
                'caseArea' => $caseArea
            )
        );
    }

    /**
     * @Route("/line/{id}", name="line")
     *
     * @param $id integer
     */
    public function lineAction($id) {
        $line = $this->getDoctrine()
            ->getRepository('AppBundle:Line')
            ->find($id);

        return $this->render('AppBundle:default:line.html.twig',
            array(
                'line' => $line
            )
        );

    }
}
