<?php

namespace App\Form;

use App\Entity\Idoso;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IdosoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome')
            ->add('cpf')
            ->add('email')
            ->add('dataNascimento')
            ->add('endereco')
            ->add('consultaConsulta')
            ->add('exameExame')
            ->add('medicamentoMedicamento')
            ->add('sintomaSintoma')
            ->add('cuidadorCuidador')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Idoso::class,
        ]);
    }
}
