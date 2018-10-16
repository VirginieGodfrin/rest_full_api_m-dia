<?php

namespace AppBundle\Controller\Api;

use AppBundle\Controller\BaseController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method; 
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\BattleType;
use AppBundle\Form\Model\BattleModel;
use AppBunlde\Entity\User;


class BattleController extends BaseController
{
	/**
	 * @Route("/api/battles") 
	 * @Method("POST")
	 */
	public function newAction(Request $request) 
	{
		$user = $this->findUserByUsername('weaverryan');

		// $this->denyAccessUnlessGranted('ROLE_USER');
		
		$battleModel = new BattleModel();

		$form = $this->createForm(BattleType::class, $battleModel, [ 
			'user' => $user
		]);

		$this->processForm($request, $form);

		if (!$form->isValid()) { 
			$this->throwApiProblemValidationException($form);
		}

		$battle = $this->getBattleManager()->battle( 
			$battleModel->getProgrammer(), 
			$battleModel->getProject()
		);

		return $this->createApiResponse($battle, 201);
	}
}
