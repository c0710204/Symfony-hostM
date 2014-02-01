<?php

namespace c0710204\admin\settingsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('c0710204adminsettingsBundle:Default:index.html.twig', array('name' => $name));
    }
}
