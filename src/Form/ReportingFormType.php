<?php

namespace App\Form;

use App\Entity\Reporting;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReportingFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('content')
            ->add('closing')
            ->add('slug')
            ->add('created_at')
            ->add('updated_at')
            ->add('type')
            ->add('version')
            ->add('source')
            ->add('other_source')
            ->add('info_type_requested')
            ->add('codaf')
            ->add('codaf_dpt')
            ->add('person')
            ->add('nir')
            ->add('first_name')
            ->add('last_name')
            ->add('married_name')
            ->add('birthday')
            ->add('birthplace')
            ->add('deathday')
            ->add('last_known_address')
            ->add('lodging')
            ->add('phone')
            ->add('gsm')
            ->add('email')
            ->add('familly_situation')
            ->add('situation_since')
            ->add('married_nir')
            ->add('married_birthname')
            ->add('married_lastname')
            ->add('married_firstname')
            ->add('children')
            ->add('pro_situation')
            ->add('pro_situation_other')
            ->add('resources_origin')
            ->add('resources_origin_other')
            ->add('loss_amount')
            ->add('loss_real')
            ->add('loss_from')
            ->add('loss_to')
            ->add('loss_avoided')
            ->add('appendices')
            ->add('social_name')
            ->add('commercial_name')
            ->add('activity')
            ->add('creation_date')
            ->add('closure_date')
            ->add('rj_date')
            ->add('lj_date')
            ->add('siret')
            ->add('company_address')
            ->add('pro_management_period_from1')
            ->add('pro_management_period_to1')
            ->add('pro_management_name1')
            ->add('pro_management_address1')
            ->add('pro_management_period_from2')
            ->add('pro_management_period_to2')
            ->add('pro_management_name2')
            ->add('pro_management_address2')
            ->add('author')
            ->add('category')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reporting::class,
        ]);
    }
}
