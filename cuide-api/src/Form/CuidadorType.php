<?php

namespace App\Form;

use App\Entity\Cuidador;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CuidadorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome')
            ->add('cpf')
            ->add('email')
            ->add('dataNascimento')
            ->add('certificacao')
            ->add('foto')
            ->add('idosoIdoso')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cuidador::class,
        ]);
    }
}
