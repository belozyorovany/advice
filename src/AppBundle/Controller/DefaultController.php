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
            ->getRepository('AppBundle:FAQCategory');

        $query = $repository->createQueryBuilder('fc')
            ->where('fc.active = \'1\'')
            ->orderBy('fc.weight', 'ASC')
            ->setMaxResults(2)
            ->getQuery();

        $aCategory = $query->getResult();

        $aFAQCategory = [];
        foreach ($aCategory as $oCategory) {
            $repository = $this->getDoctrine()
                ->getRepository('AppBundle:FAQ');

            $query = $repository->createQueryBuilder('f')
                ->where('f.category = :category_id')
                ->setParameter('category_id', $oCategory->getId())
                ->andWhere('f.active = \'1\'')
                ->orderBy('f.weight', 'ASC')
                ->getQuery();

            $aFAQ = $query->getResult();

            $aFAQCategory[$oCategory->getWeight()] = [
                'name' => $oCategory->getName(),
                'FAQ' => $aFAQ
            ];

        }

        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Line');

        $query = $repository->createQueryBuilder('l')
            ->where('l.active = \'1\'')
            ->orderBy('l.weight', 'ASC')
            ->getQuery();

        $aLine = $query->getResult();

        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:CaseArea');

        $query = $repository->createQueryBuilder('ca')
            ->where('ca.active = \'1\'')
            ->orderBy('ca.weight', 'ASC')
            ->setMaxResults(3)
            ->getQuery();

        $aCaseArea = $query->getResult();

        return $this->render('AppBundle:default:index.html.twig',
            array(
                'FAQCategories' => $aFAQCategory,
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
