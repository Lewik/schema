<?php

namespace Lewik\BoManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/** Class DefaultController */
class DefaultController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function businessObjectsAction()
    {
        $this->container->get('lewikbomanagerbundle.manager.bomanager')
            ->makeTestEntity();

        return $this->render('LewikBoManagerBundle:Default:index.html.twig', ['name' => 'asdsa']);
    }
}
