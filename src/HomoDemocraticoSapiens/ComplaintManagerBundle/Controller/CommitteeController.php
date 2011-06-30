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
 * @Route("/registre-doleances/commissions")
 */
class CommitteeController extends Controller
{
    /**
     * Displays a form to create a new Committee entity.
     *
     * @Route("/lancement", name="committee_new")
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
     * @Route("/creation", name="committee_create")
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

                return $this->redirect($this->generateUrl('committee_show', array('id' => $entity->getId())));
                
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
     * @Route("/edition/{id}", name="committee_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('HomoDemocraticoSapiensComplaintManagerBundle:Committee')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Committee entity.');
        }

        $editForm = $this->createForm(new CommitteeType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Committee entity.
     *
     * @Route("/mise-a-jour/{id}", name="committee_update")
     * @Method("post")
     * @Template("HomoDemocraticoSapiensComplaintManagerBundle:Committee:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('HomoDemocraticoSapiensComplaintManagerBundle:Committee')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Committee entity.');
        }

        $editForm   = $this->createForm(new CommitteeType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        if ('POST' === $request->getMethod()) {
            $editForm->bindRequest($request);

            if ($editForm->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($entity);
                $em->flush();

                return $this->redirect($this->generateUrl('committee_edit', array('id' => $id)));
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
     * @Route("/dissolution/{id}", name="committee_delete")
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

        return $this->redirect($this->generateUrl('committee'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
