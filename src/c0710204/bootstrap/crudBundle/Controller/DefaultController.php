<?php

namespace c0710204\bootstrap\crudBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('c0710204bootstrapcrudBundle:Default:index.html.twig', array('name' => $name));
    }
}
