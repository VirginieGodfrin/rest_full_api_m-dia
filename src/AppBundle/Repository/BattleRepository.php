<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class BattleRepository extends EntityRepository
{
	public function createQueryBuilderForProgrammer(Programmer $programmer){
		return $this->createQueryBuilder('battle') 
			->andWhere('battle.programmer = :programmer') 
			->setParameter('programmer', $programmer);

	}
}
