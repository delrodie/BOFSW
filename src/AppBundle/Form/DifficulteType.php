<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DifficulteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('age')->add('mga')->add('decision')->add('allemand')->add('anglais')->add('autres')->add('calcul')->add('dictee')->add('espagnol')->add('francais')->add('hg')->add('lecture')->add('maths')->add('scolaire')->add('sp')->add('svt')->add('rang')->add('observation')->add('mgaTotalClasse')->add('resultat');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Difficulte'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_difficulte';
    }


}
