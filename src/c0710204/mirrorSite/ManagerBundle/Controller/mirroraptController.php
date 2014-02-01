<?php

namespace c0710204\mirrorSite\ManagerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use c0710204\mirrorSite\ManagerBundle\Entity\mirrorapt;
use c0710204\mirrorSite\ManagerBundle\Entity\mirrorinfo;
use c0710204\mirrorSite\ManagerBundle\Form\mirroraptType;

/**
 * mirrorapt controller.
 *
 * @Route("/apt")
 */
class mirroraptController extends Controller
{

    /**
     * Lists all mirrorapt entities.
     *
     * @Route("/", name="mirrorapt")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new mirrorapt();
        $entities = $em->getRepository('c0710204mirrorSiteManagerBundle:mirrorapt')->findAll();
        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new mirrorapt entity.
     *
     * @Route("/", name="mirrorapt_create")
     * @Method("POST")
     * @Template("c0710204mirrorSiteManagerBundle:mirrorapt:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new mirrorapt();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('mirrorapt_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    /**
     * import a new mirrorapt entity by apt line.
     *
     * @Route("/import", name="mirrorapt_import")
     * @Method("POST")
     * @Template("c0710204mirrorSiteManagerBundle:mirrorapt:new.html.twig")
     */
    public function importAction(Request $request)
    {
        $entity = new mirrorapt();
        $mirror = new mirrorinfo();
        //var_dump($request->line);
        $line=$_POST['line'];
        $mirrorname=$_POST['mirrorname'];
        //$form = $this->createCreateForm($entity);
        //$form->handleRequest($request);
        //
        $items=explode(' ', $line);
        $kind=explode('-', $items[0]);
        $em = $this->getDoctrine()->getManager();
        $entity->setmirrorid($em->getRepository('c0710204mirrorSiteManagerBundle:mirrorinfo')->findOneBy(array('name'=>$mirrorname)));
        $entity->setkind($em->getRepository('c0710204mirrorSiteManagerBundle:platform')->findOneBy(array('aptname'=>$kind[1])));  
        $entity->seturl(str_replace('\\', '/', $items[1]));
        $entity->setversion($items[2]);
        unset($items[2]);
        unset($items[1]);
        unset($items[0]);
        $entity->setsofttype(implode(' ', $items));
        $em = $this->getDoctrine()->getManager();
        $em->persist($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('mirrorapt_show', array('id' => $entity->getId())));
    }    
    /**
     * generate mirror.list file.
     *
     * @Route("/file/{prefix}", name="mirrorapt_genmirrorlist")
     * @Method("GET")
     * @Template("c0710204mirrorSiteManagerBundle:files:mirror.list.text.twig")
     */
    public function genmirrorlistAction($prefix)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('c0710204mirrorSiteManagerBundle:mirrorapt')->findAll();

        return array(
            'apt' => $entities,
            'prefix' => str_replace('\\', '/', $prefix),
        );
    }
    /**
     * generate mirror.list file to place.
     *
     * @Route("/gen/{prefix}", name="mirrorapt_genmirrorlist2opt")
     * @Method("GET")
     * @Template()
     */
    public function genmirrorlist2optAction($prefix)
    {
       	$list=file_get_contents('http://'.$_SERVER['SERVER_NAME'].$this->generateUrl('mirrorapt_genmirrorlist', array('prefix' => $prefix)));
		file_put_contents('/opt/mirrortools/tools/mirror.list',$list);
        return $this->redirect($this->generateUrl('mirrorapt'));
    }
    /**
    * Creates a form to create a mirrorapt entity.
    *
    * @param mirrorapt $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(mirrorapt $entity)
    {
        $form = $this->createForm(new mirroraptType(), $entity, array(
            'action' => $this->generateUrl('mirrorapt_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }
    /*
    * Creates a form to import a mirrorapt entity by a line.
    *
    * @param mirrorapt $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createimportForm(mirrorapt $entity)
    {

        $form1 = $this->createForm(new mirroraptType(), $entity, array(
            'action' => $this->generateUrl('mirrorapt_import'),
            'method' => 'POST',
        ));     

        $form1->add('submit', 'submit', array('label' => 'import'))->add('line','text');;
        return $form1;
    }
    /**
     * Displays a form to create a new mirrorapt entity.
     *
     * @Route("/new", name="mirrorapt_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new mirrorapt();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a mirrorapt entity.
     *
     * @Route("/{id}", name="mirrorapt_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('c0710204mirrorSiteManagerBundle:mirrorapt')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find mirrorapt entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing mirrorapt entity.
     *
     * @Route("/{id}/edit", name="mirrorapt_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('c0710204mirrorSiteManagerBundle:mirrorapt')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find mirrorapt entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a mirrorapt entity.
    *
    * @param mirrorapt $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(mirrorapt $entity)
    {
        $form = $this->createForm(new mirroraptType(), $entity, array(
            'action' => $this->generateUrl('mirrorapt_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing mirrorapt entity.
     *
     * @Route("/{id}", name="mirrorapt_update")
     * @Method("PUT")
     * @Template("c0710204mirrorSiteManagerBundle:mirrorapt:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('c0710204mirrorSiteManagerBundle:mirrorapt')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find mirrorapt entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('mirrorapt_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a mirrorapt entity.
     *
     * @Route("/{id}", name="mirrorapt_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('c0710204mirrorSiteManagerBundle:mirrorapt')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find mirrorapt entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('mirrorapt'));
    }

    /**
     * Creates a form to delete a mirrorapt entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mirrorapt_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
