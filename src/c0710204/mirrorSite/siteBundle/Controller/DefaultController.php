<?php

namespace c0710204\mirrorSite\siteBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use c0710204\mirrorSite\ManagerBundle\Entity\mirrorinfo;
use c0710204\mirrorSite\ManagerBundle\Form\mirrorinfoType;
use c0710204\mirrorSite\ManagerBundle\Entity\mirrorstatus;
use c0710204\mirrorSite\ManagerBundle\Form\mirrorstatusType;
class DefaultController extends Controller
{
    public function indexAction()
    {
		$em = $this->getDoctrine()->getManager();
		$entities = $em->getRepository('c0710204mirrorSiteManagerBundle:mirrorinfo')->findAll();
        return $this->render('c0710204mirrorSitesiteBundle:Default:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    public function repogenAction()
    {
        return $this->render('c0710204mirrorSitesiteBundle:Default:repogen.html.twig');
    }    
    public function updatestatusAction($mirror,$json)
    {
		$status = new mirrorstatus();
		$j=json_decode($json);
		$status->setsize($j->size);
		$status->setstatus($j->status);
		$status->setfilecount($j->filecount);
		$status->setupdatetime($j->updatetime);
		$em = $this->getDoctrine()->getEntityManager();
		$em->persist($status);
		$em = $this->getDoctrine()->getManager();
		$entities = $em->getRepository('c0710204mirrorSiteManagerBundle:mirrorinfo')
						->findBy(array('name' => $mirror));
		if ($entities[0]) {
			$entities[0]->setstatus($status);
			$em->flush();
		}
        return new Response('update status ok');
    }
}
