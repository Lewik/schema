<?php

namespace Lewik\BoManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

/** Class DefaultController */
class DefaultController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function businessObjectsAction()
    {
        $this->container->get('file_locator');
        $finder = new Finder();
        $finder->files()->in(
            $this->get('kernel')->getRootDir() . DIRECTORY_SEPARATOR .
            '..' . DIRECTORY_SEPARATOR .
            'src' . DIRECTORY_SEPARATOR .
            'Lewik' . DIRECTORY_SEPARATOR .
            'BoBundle' . DIRECTORY_SEPARATOR .
            'Resources' . DIRECTORY_SEPARATOR .
            'config' . DIRECTORY_SEPARATOR .
            'doctrine'
        );

        /** @var SplFileInfo $file */
        foreach ($finder as $file) {
            //$file->getFilename()


        }
        return $this->render('LewikBoManagerBundle:Default:businessObjectList.html.twig', ['files' => $finder]);
    }
}
