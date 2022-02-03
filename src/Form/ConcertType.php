<?php

namespace App\Form;

use App\Entity\Band;
use App\Entity\Concert;
use App\Entity\Organizer;
use App\Entity\Room;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConcertType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('dateStart', DateType::class, [
                'widget' => 'choice',
                'format' => 'dd/MM/yyyy'
            ])
            ->add('dateEnd', DateType::class, [
                'widget' => 'choice',
                'format' => 'dd/MM/yyyy'
            ])
            ->add('organizer', EntityType::class, [
                'class' => Organizer::class,
                'multiple' => true,
                'choice_label' => 'firstName'
            ])
            ->add('room', EntityType::class,[
                'class' => Room::class,
                'choice_label' => 'name'           
            ])
            ->add('band', EntityType::class,[
                'class' => Band::class,
                'choice_label' => 'name'
            ])
            ->add('Enregistrer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Concert::class,
        ]);
    }
}
