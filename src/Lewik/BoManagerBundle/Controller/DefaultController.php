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
    public function businessObjectsAction(){
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

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function generateObjectAction()
    {
        $entityName = 'Test' . time();
        $fields = [
            [
                'columnName' => 'asdsdsadsadsa',
                'fieldName' => 'asdsdsadsadsa',
                'type' => 'string',
                'length' => 255,
            ],
        ];
        $this->container->get('lewik_bomanagerbundle.manager.bomanager')
            ->generateEntity($entityName, $fields);

        return $this->render('LewikBoManagerBundle:Default:index.html.twig', ['name' => 'asdsa']);
    }
}
