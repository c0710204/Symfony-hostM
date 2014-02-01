<?php

namespace c0710204\mirrorSite\ManagerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use c0710204\mirrorSite\ManagerBundle\Entity\mirrorcmd;
use c0710204\mirrorSite\ManagerBundle\Form\mirrorcmdType;

/**
 * mirrorcmd controller.
 *
 * @Route("/mirrorcmd")
 */
class mirrorcmdController extends Controller
{

    /**
     * Lists all mirrorcmd entities.
     *
     * @Route("/", name="mirrorcmd")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('c0710204mirrorSiteManagerBundle:mirrorcmd')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new mirrorcmd entity.
     *
     * @Route("/", name="mirrorcmd_create")
     * @Method("POST")
     * @Template("c0710204mirrorSiteManagerBundle:mirrorcmd:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new mirrorcmd();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('mirrorcmd_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a mirrorcmd entity.
    *
    * @param mirrorcmd $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(mirrorcmd $entity)
    {
        $form = $this->createForm(new mirrorcmdType(), $entity, array(
            'action' => $this->generateUrl('mirrorcmd_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new mirrorcmd entity.
     *
     * @Route("/new", name="mirrorcmd_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new mirrorcmd();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a mirrorcmd entity.
     *
     * @Route("/{id}", name="mirrorcmd_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('c0710204mirrorSiteManagerBundle:mirrorcmd')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find mirrorcmd entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing mirrorcmd entity.
     *
     * @Route("/{id}/edit", name="mirrorcmd_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('c0710204mirrorSiteManagerBundle:mirrorcmd')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find mirrorcmd entity.');
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
    * Creates a form to edit a mirrorcmd entity.
    *
    * @param mirrorcmd $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(mirrorcmd $entity)
    {
        $form = $this->createForm(new mirrorcmdType(), $entity, array(
            'action' => $this->generateUrl('mirrorcmd_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing mirrorcmd entity.
     *
     * @Route("/{id}", name="mirrorcmd_update")
     * @Method("PUT")
     * @Template("c0710204mirrorSiteManagerBundle:mirrorcmd:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('c0710204mirrorSiteManagerBundle:mirrorcmd')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find mirrorcmd entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('mirrorcmd_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a mirrorcmd entity.
     *
     * @Route("/{id}", name="mirrorcmd_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('c0710204mirrorSiteManagerBundle:mirrorcmd')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find mirrorcmd entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('mirrorcmd'));
    }

    /**
     * Creates a form to delete a mirrorcmd entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mirrorcmd_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
