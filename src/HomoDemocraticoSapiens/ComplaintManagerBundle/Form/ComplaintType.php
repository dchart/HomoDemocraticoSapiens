<?php

namespace HomoDemocraticoSapiens\ComplaintManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ComplaintType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('title','text',array('label'=>'Titre'))
            ->add('committee',null,array('label'=>'Commission'))
            ->add('message','textarea')
        ;
    }
}
