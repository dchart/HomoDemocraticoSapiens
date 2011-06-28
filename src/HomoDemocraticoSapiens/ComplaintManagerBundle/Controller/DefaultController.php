<?php

namespace HomoDemocraticoSapiens\ComplaintManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/registre-doleances", name="complaint_manager")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}
