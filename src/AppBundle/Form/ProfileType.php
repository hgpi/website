<?php
/**
 * Created by PhpStorm.
 * User: glefevre
 * Date: 01/03/2018
 * Time: 15:27
 */

namespace AppBundle\Form;


use AppBundle\AppBundle;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TelType;

class ProfileType extends BaseType
{
    public function buildUserForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildUserForm($builder, $options);

        $builder
            ->remove('username')
            ->add('nom')
            ->add('prenom')
            ->remove('current_password')
            ->add('newsletter')
            ->add('adresse')
            ->add('cp')
            ->add('ville')
            ->add('career',TextType::class,array(
                'label' => 'Situation actuelle',
            ))
            ->add('profilIsPublic')
            ->add('bio')
            ->add('birthday',BirthdayType::class)
            ->add('phone',TelType::class, array(
                'label' => 'Téléphone : +33',
            ))
            ;
    }


    public function getBlockPrefix()
    {
        return 'app_user_edit_profile';
    }
}