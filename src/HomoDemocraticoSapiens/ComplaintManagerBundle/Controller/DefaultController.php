<?php

namespace HomoDemocraticoSapiens\ComplaintManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/registre-doleances", name="complaint_manager")
     * @Route("/registre-doleances/{committee}", name="complaint_manager_committee")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->container->get('doctrine.orm.entity_manager');
        $committees = $em->getRepository('HomoDemocraticoSapiensComplaintManagerBundle:Committee')->findAll();
        return array('committees'=>$committees);
    }
}
