<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Company;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('address_street')
            ->add('address_city')
            ->add('address_zip')
            // ->add('clients', EntityType::class, [
            //     'class' => Client::class,
            //     'choice_label' => 'id',
            //     'multiple' => true,
            //     'required' => false
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Company::class,
        ]);
    }
}
