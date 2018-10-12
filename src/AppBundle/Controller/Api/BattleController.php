<?php

namespace AppBundle\Controller\Api;

use AppBundle\Controller\BaseController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method; 
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BattleController extends BaseController
{
	/**
	 * @Route("/api/battles") * @Method("POST")
	 */
	public function newAction() 
	{
		$programmer = new Programmer();
		$form = $this->createForm(ProgrammerType::class, $programmer); 
		$this->processForm($request, $form);
	}
}
