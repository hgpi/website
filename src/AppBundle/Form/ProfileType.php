<?php
/**
 * Created by PhpStorm.
 * User: glefevre
 * Date: 01/03/2018
 * Time: 15:27
 */

namespace AppBundle\Form;


use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;
use Symfony\Component\Form\FormBuilderInterface;

class ProfileType extends BaseType
{
    public function buildUserForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildUserForm($builder, $options);

        $builder
            ->remove('username')
            ->add('nom')
            ->add('prenom');
    }


    public function getBlockPrefix()
    {
        return 'app_user_edit_profile';
    }
}