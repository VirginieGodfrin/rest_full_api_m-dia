<?php

namespace AppBundle\Form\Model;

class BattleModel
{
	private $project;

	private $programmer;
	
	public function getProject()
	{
	return $this->project;
	}
	
	public function setProject(Project $project)
	{
		$this->project = $project;
	}

	public function getProgrammer()
	{
		return $this->programmer;
	}
	
	public function setProgrammer(Programmer $programmer)
	{
		$this->programmer = $programmer;
	}
}