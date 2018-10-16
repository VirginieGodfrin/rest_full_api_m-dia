<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Form\Model\BattleModel;
use AppBundle\Repository\ProgrammerRepository;



class BattleType extends AbstractType 
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$user = $options['user'];
		// property_path: The form now expects the client to send projectId and programmerId . 
		// But when it sets the final data on BattleModel , it will call setProject() and setProgrammer() .
		// this is the way to have a field name that's different than the property name on your class
		$builder
			->add('programmerId', EntityType::class, [
				'class' => 'AppBundle\Entity\Programmer',
				'property_path' => 'programmer',
				'query_builder' => function(ProgrammerRepository $repo) use ($user) { 
					return $repo->createQueryBuilderForUser($user);
				},
			])
			->add('projectId', EntityType::class, [ 
				'class' => 'AppBundle\Entity\Project',
				'property_path' => 'project'
			]);
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults([
			'data_class' => BattleModel::class,
			'csrf_protection' => false,
		]);
		$resolver->setRequired(['user']);

	} 
}