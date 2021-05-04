<?php

namespace App\Form;

use App\Entity\Medicamento;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MedicamentoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome')
            ->add('quantidade')
            ->add('dosagem')
            ->add('dataInicio')
            ->add('dataFim')
            ->add('horario')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Medicamento::class,
        ]);
    }
}
