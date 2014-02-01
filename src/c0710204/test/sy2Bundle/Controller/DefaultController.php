<?php

namespace c0710204\test\sy2Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('c0710204testsy2Bundle:Default:index.html.twig', array('name' => $name));
    }
}
