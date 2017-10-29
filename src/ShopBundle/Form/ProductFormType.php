<?php

namespace ShopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Tytuł'
            ])
            ->add('quantity', NumberType::class, [
                'label' => 'Ilość',
            ])
            ->add('price', MoneyType::class, [
                'currency' => 'PLN',
                'label' => 'Cena'
            ])
            ->add('oldPrice', MoneyType::class, [
                'currency' => 'PLN',
                'label' => 'Cena przed Obniżką'
            ])
            ->add('description', TextType::class , [
                'label' => 'Opis'
            ])
            ->add('createdDate', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Data utworzenia'
            ])
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'ShopBundle\Entity\Product'
        ]);
    }
}