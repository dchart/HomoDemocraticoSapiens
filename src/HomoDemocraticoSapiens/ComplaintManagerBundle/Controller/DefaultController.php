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
    public function indexAction($committee = null)
    {
        $em = $this->container->get('doctrine.orm.entity_manager');
        $committees = $em->getRepository('HomoDemocraticoSapiensComplaintManagerBundle:Committee')->findAll();
        $cmt = null;
        if($committee):
          $cmt = $em->getRepository('HomoDemocraticoSapiensComplaintManagerBundle:Committee')->findOneBy(array('slug' => $committee));
          if (!$cmt):
            throw $this->createNotFoundException('Unable to find Committee entity for this slug on URL.');
          endif;
        endif;
        return array('committee'=>$cmt, 'committees'=>$committees);
    }
}
