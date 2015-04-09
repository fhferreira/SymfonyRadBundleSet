<?php

namespace Core\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GroupPermissionsType extends AbstractType
{
    private $roles;
    
    public function __construct($options){
        $this->roles = $options['roles'];
        
        //print_r($this->roles);
        
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('roles','choice',array(
                    'choices'=> $this->roles, 
                    'expanded'=> false,
                    'multiple' => true
                ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Core\UserBundle\Entity\Group'
        ));
    }
    
    public function getName()
    {
        return 'admin_userbundle_grouppermissions';
    }
}
