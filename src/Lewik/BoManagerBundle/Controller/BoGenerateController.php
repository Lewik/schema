<?php

namespace Lewik\BoManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/** Class BoGenerateController */
class BoGenerateController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function generateAction(Request $request)
    {
        $this->container->get('lewik_bomanagerbundle.manager.bomanager')
            ->generateAll();


        return new RedirectResponse($request->headers->get('referer'));

    }
}
