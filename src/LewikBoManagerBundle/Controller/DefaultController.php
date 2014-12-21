<?php

namespace LewikBoManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function businessObjectsAction($name)
    {
        return $this->render('LewikBoManagerBundle:Default:index.html.twig', array('name' => $name));
    }
}
