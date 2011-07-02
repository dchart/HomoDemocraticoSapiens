<?php

namespace HomoDemocraticoSapiens\ComplaintManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CommitteeType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        if($options['data']->getId() != null):
          $builder
              ->add('name', 'text', array('read_only'=>true))
              ->add('description', 'textarea')
          ;
        else:
          $builder
              ->add('name')
              ->add('description', 'textarea')
          ;
        endif;
    }
}
