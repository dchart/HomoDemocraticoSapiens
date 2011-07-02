<?php

namespace HomoDemocraticoSapiens\ComplaintManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use HomoDemocraticoSapiens\ComplaintManagerBundle\Entity\Committee;
use HomoDemocraticoSapiens\ComplaintManagerBundle\Form\CommitteeType;

/**
 * Committee controller.
 *
 * @Route("/registre-doleances/admin")
 */
class CommitteeController extends Controller
{
    /**
     * Displays a form to create a new Committee entity.
     *
     * @Route("/inauguration-commission", name="committee_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Committee();
        $form   = $this->createForm(new CommitteeType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Committee entity.
     *
     * @Route("/creation-commission", name="committee_create")
     * @Method("post")
     * @Template("HomoDemocraticoSapiensComplaintManagerBundle:Committee:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Committee();
        $request = $this->getRequest();
        $form    = $this->createForm(new CommitteeType(), $entity);
        
        if ('POST' === $request->getMethod()) {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($entity);
                $em->flush();

                return $this->redirect($this->generateUrl('complaint_manager'));
                
            }
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Committee entity.
     *
     * @Route("/edition-commission/{slug}", name="committee_edit")
     * @Template()
     */
    public function editAction($slug)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('HomoDemocraticoSapiensComplaintManagerBundle:Committee')->findOneBy(array('slug' => $slug));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Committee entity.');
        }

        $editForm = $this->createForm(new CommitteeType(), $entity);
        $deleteForm = $this->createDeleteForm($entity->getId());

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Committee entity.
     *
     * @Route("/mise-a-jour/{slug}", name="committee_update")
     * @Method("post")
     * @Template("HomoDemocraticoSapiensComplaintManagerBundle:Committee:edit.html.twig")
     */
    public function updateAction($slug)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('HomoDemocraticoSapiensComplaintManagerBundle:Committee')->findOneBy(array('slug' => $slug));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Committee entity.');
        }

        $editForm   = $this->createForm(new CommitteeType(), $entity);
        $deleteForm = $this->createDeleteForm($entity->getId());

        $request = $this->getRequest();

        if ('POST' === $request->getMethod()) {
            $editForm->bindRequest($request);

            if ($editForm->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($entity);
                $em->flush();

                return $this->redirect($this->generateUrl('complaint_manager'));
            }
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Committee entity.
     *
     * @Route("/dissolution-commission/{id}", name="committee_delete")
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
                $entity = $em->getRepository('HomoDemocraticoSapiensComplaintManagerBundle:Committee')->find($id);

                if (!$entity) {
                    throw $this->createNotFoundException('Unable to find Committee entity.');
                }

                $em->remove($entity);
                $em->flush();
            }
        }

        return $this->redirect($this->generateUrl('complaint_manager'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
