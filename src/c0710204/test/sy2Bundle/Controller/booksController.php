<?php

namespace c0710204\test\sy2Bundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use c0710204\test\sy2Bundle\Entity\books;
use c0710204\test\sy2Bundle\Form\booksType;

/**
 * books controller.
 *
 * @Route("/books")
 */
class booksController extends Controller
{

    /**
     * Lists all books entities.
     *
     * @Route("/", name="books")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('c0710204testsy2Bundle:books')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new books entity.
     *
     * @Route("/", name="books_create")
     * @Method("POST")
     * @Template("c0710204testsy2Bundle:books:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new books();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('books_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a books entity.
    *
    * @param books $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(books $entity)
    {
        $form = $this->createForm(new booksType(), $entity, array(
            'action' => $this->generateUrl('books_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new books entity.
     *
     * @Route("/new", name="books_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new books();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a books entity.
     *
     * @Route("/{id}", name="books_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('c0710204testsy2Bundle:books')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find books entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing books entity.
     *
     * @Route("/{id}/edit", name="books_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('c0710204testsy2Bundle:books')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find books entity.');
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
    * Creates a form to edit a books entity.
    *
    * @param books $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(books $entity)
    {
        $form = $this->createForm(new booksType(), $entity, array(
            'action' => $this->generateUrl('books_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing books entity.
     *
     * @Route("/{id}", name="books_update")
     * @Method("PUT")
     * @Template("c0710204testsy2Bundle:books:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('c0710204testsy2Bundle:books')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find books entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('books_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a books entity.
     *
     * @Route("/{id}", name="books_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('c0710204testsy2Bundle:books')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find books entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('books'));
    }

    /**
     * Creates a form to delete a books entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('books_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
