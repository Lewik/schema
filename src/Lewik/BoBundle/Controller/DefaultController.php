<?php

namespace Lewik\BoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {



        return $this->render('LewikBoBundle:Default:index.html.twig');
    }
}
