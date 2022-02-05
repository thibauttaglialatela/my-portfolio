<?php

namespace App\Form;

use App\Entity\PersonnalContent;
use Doctrine\DBAL\Types\TextType;
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
            ->add('adresse', TextType::class)
            ->add('Ville', TextType::class)
            ->add('Code postale', NumberType::class)
            ->add('Numéro de téléphone', TelType::class)
            ->add('email', EmailType::class)
            ->add('GitHub', TextType::class)
            ->add('linkedin', TextType::class)
            ->add('Photo', TextType::class)
            ->add('Biographie', CKEditorType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PersonnalContent::class,
        ]);
    }
}
