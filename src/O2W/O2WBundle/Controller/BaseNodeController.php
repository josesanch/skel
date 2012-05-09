<?php

namespace O2W\O2WBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use O2W\O2WBundle\Entity\BaseNode;
use O2W\O2WBundle\Form\BaseNodeType;

/**
 * BaseNode controller.
 *
 * @Route("/basenode")
 */
class BaseNodeController extends Controller
{
    /**
     * Lists all BaseNode entities.
     *
     * @Route("/", name="basenode")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('O2WBundle:BaseNode')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a BaseNode entity.
     *
     * @Route("/{id}/show", name="basenode_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('O2WBundle:BaseNode')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BaseNode entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new BaseNode entity.
     *
     * @Route("/new", name="basenode_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BaseNode();
        $form   = $this->createForm(new BaseNodeType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new BaseNode entity.
     *
     * @Route("/create", name="basenode_create")
     * @Method("post")
     * @Template("O2WBundle:BaseNode:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new BaseNode();
        $request = $this->getRequest();
        $form    = $this->createForm(new BaseNodeType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('basenode_show', array('id' => $entity->getId())));

        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing BaseNode entity.
     *
     * @Route("/{id}/edit", name="basenode_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('O2WBundle:BaseNode')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BaseNode entity.');
        }

        $editForm = $this->createForm(new BaseNodeType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing BaseNode entity.
     *
     * @Route("/{id}/update", name="basenode_update")
     * @Method("post")
     * @Template("O2WBundle:BaseNode:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('O2WBundle:BaseNode')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BaseNode entity.');
        }

        $editForm   = $this->createForm(new BaseNodeType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('basenode_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a BaseNode entity.
     *
     * @Route("/{id}/delete", name="basenode_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('O2WBundle:BaseNode')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BaseNode entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('basenode'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
