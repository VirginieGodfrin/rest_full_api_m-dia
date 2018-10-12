<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class BattleType extends AbstractType 
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('programmer', EntityType::class, [
				'class' => 'AppBundle\Entity\Programmer' 
			])
			->add('project', EntityType::class, [ 
				'class' => 'AppBundle\Entity\Project'
			])
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults([
			'data_class' => BattleModel::class,
			'csrf_protection' => false,
		]);

	} 
}