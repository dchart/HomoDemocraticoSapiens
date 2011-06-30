<?php

namespace HomoDemocraticoSapiens\ComplaintManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use HomoDemocraticoSapiens\ComplaintManagerBundle\Entity\Complaint;
use HomoDemocraticoSapiens\ComplaintManagerBundle\Form\ComplaintType;

/**
 * Complaint controller.
 *
 * @Route("/doleances")
 */
class ComplaintController extends Controller
{
    /**
     * Lists all Complaint entities.
     *
     * @Route("/", name="doleances")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('HomoDemocraticoSapiensComplaintManagerBundle:Complaint')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Complaint entity.
     *
     * @Route("/{id}/show", name="doleances_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('HomoDemocraticoSapiensComplaintManagerBundle:Complaint')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Complaint entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new Complaint entity.
     *
     * @Route("/new", name="doleances_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Complaint();
        $form   = $this->createForm(new ComplaintType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Complaint entity.
     *
     * @Route("/create", name="doleances_create")
     * @Method("post")
     * @Template("HomoDemocraticoSapiensComplaintManagerBundle:Complaint:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Complaint();
        $request = $this->getRequest();
        $form    = $this->createForm(new ComplaintType(), $entity);

        if ('POST' === $request->getMethod()) {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($entity);
                $em->flush();

                return $this->redirect($this->generateUrl('doleances_show', array('id' => $entity->getId())));
                
            }
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Complaint entity.
     *
     * @Route("/{id}/edit", name="doleances_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('HomoDemocraticoSapiensComplaintManagerBundle:Complaint')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Complaint entity.');
        }

        $editForm = $this->createForm(new ComplaintType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Complaint entity.
     *
     * @Route("/{id}/update", name="doleances_update")
     * @Method("post")
     * @Template("HomoDemocraticoSapiensComplaintManagerBundle:Complaint:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('HomoDemocraticoSapiensComplaintManagerBundle:Complaint')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Complaint entity.');
        }

        $editForm   = $this->createForm(new ComplaintType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        if ('POST' === $request->getMethod()) {
            $editForm->bindRequest($request);

            if ($editForm->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($entity);
                $em->flush();

                return $this->redirect($this->generateUrl('doleances_edit', array('id' => $id)));
            }
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Complaint entity.
     *
     * @Route("/{id}/delete", name="doleances_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        if ('POST' === $request->getMethod()) {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $entity = $em->getRepository('HomoDemocraticoSapiensComplaintManagerBundle:Complaint')->find($id);

                if (!$entity) {
                    throw $this->createNotFoundException('Unable to find Complaint entity.');
                }

                $em->remove($entity);
                $em->flush();
            }
        }

        return $this->redirect($this->generateUrl('doleances'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
