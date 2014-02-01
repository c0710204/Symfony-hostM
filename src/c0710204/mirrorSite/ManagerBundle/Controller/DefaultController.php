<?php

namespace c0710204\mirrorSite\ManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('c0710204mirrorSiteManagerBundle:Default:index.html.twig');
    }
   
}
