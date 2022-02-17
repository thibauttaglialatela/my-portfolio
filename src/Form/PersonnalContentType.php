<?php

namespace App\Form;

use App\Entity\PersonnalContent;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonnalContentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('adress', TextType::class,
            ['label' => 'adresse'])
            ->add('town', TextType::class,
                ['label' => 'ville'])
            ->add('zipCode', NumberType::class,
                ['label' => 'code postale'])
            ->add('phoneNumber', TelType::class,
                ['label' => 'numéro de téléphone'])
            ->add('email', EmailType::class,
                ['label' => 'e-mail'])
            ->add('GitHub_link', TextType::class,
                ['label' => 'GitHub'])
            ->add('linkedin', TextType::class,
                ['label' => 'LikedIn'])
            ->add('picture', TextType::class,
                ['label' => 'Ma photo'])
            ->add('summary', CKEditorType::class,
            ['attr' => ['row'=> 10],
                'label' => 'description',
                'config_name' => 'full',
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PersonnalContent::class,
        ]);
    }
}
