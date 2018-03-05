<?php
/**
 * Created by PhpStorm.
 * User: glefevre
 * Date: 05/03/2018
 * Time: 10:48
 */

namespace AppBundle\Form;

use AppBundle\AppBundle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TelType;

class ImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('image', FileType::class, array(
                'label' => 'Photo',
                'data_class' => null
            ));
    }


    public function getBlockPrefix()
    {
        return 'app_user_edit_image';
    }
}