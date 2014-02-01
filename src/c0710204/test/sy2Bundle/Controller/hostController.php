<?php

namespace c0710204\test\sy2Bundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use c0710204\test\sy2Bundle\Entity\host;
use c0710204\test\sy2Bundle\Form\hostType;

/**
 * host controller.
 *
 */
class hostController extends Controller
{

    /**
     * Lists all host entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('c0710204testsy2Bundle:host')->findAll();

        return $this->render('c0710204testsy2Bundle:host:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new host entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new host();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('host_show', array('id' => $entity->getId())));
        }

        return $this->render('c0710204testsy2Bundle:host:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    /**
     * Creates a new host entity with modal page.
     *
     */    
    public function createmodalAction(Request $request)
    {
        $entity = new host();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('host_modal_success', array('id' => $entity->getId())));
        }

        return $this->render('c0710204testsy2Bundle:host:new.modal.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    /**
    * Creates a form to create a host entity.
    *
    * @param host $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(host $entity)
    {
        $form = $this->createForm(new hostType(), $entity, array(
            'action' => $this->generateUrl('host_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }
    /**
     * Displays a success message for modal window
     *
     */
    public function modal_successAction()
    {
        $entity = new host();
        $form   = $this->createCreateForm($entity);

        return $this->render('c0710204testsy2Bundle:default:modal_success.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    /**
     * Displays a form to create a new host entity.
     *
     */
    public function newAction()
    {
        $entity = new host();
        $form   = $this->createCreateForm($entity);

        return $this->render('c0710204testsy2Bundle:host:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    /**
     * Displays a form to create a new host entity with modal.
     *
     */
    public function newmodalAction()
    {
        $entity = new host();
        $form   = $this->createCreateForm($entity);

        return $this->render('c0710204testsy2Bundle:host:new.modal.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    /**
     * Finds and displays a host entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('c0710204testsy2Bundle:host')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find host entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('c0710204testsy2Bundle:host:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing host entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('c0710204testsy2Bundle:host')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find host entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('c0710204testsy2Bundle:host:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a host entity.
    *
    * @param host $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(host $entity)
    {
        $form = $this->createForm(new hostType(), $entity, array(
            'action' => $this->generateUrl('host_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing host entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('c0710204testsy2Bundle:host')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find host entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('host_edit', array('id' => $id)));
        }

        return $this->render('c0710204testsy2Bundle:host:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a host entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('c0710204testsy2Bundle:host')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find host entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('host'));
    }

    /**
     * Creates a form to delete a host entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('host_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
