<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UpdateProfileType extends AbstractType
{
    public function __construct(
        private TranslatorInterface $translator)
    {}
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' =>$this->translator->trans('Prénom'),
            ])
            ->add('lastname', TextType::class, [
                'label' => $this->translator->trans('Nom'),
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
            ])
            ->add('avatar', FileType::class, [
                'data_class' => null,
                'label' => 'Avatar',
                'required' => false,
            ])
            ->add(
                'submit',
                SubmitType::class,
                [
                    'label' => $this->translator->trans('Modifier mon profil'),
                    'attr' =>
                    [
                        'class' => 'btn-warning'
                    ]
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
            'data_class' => User::class,
        ]);
    }
}
