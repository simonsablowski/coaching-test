<?php

class CoachingTestController extends Controller {
	public function index() {
		return $this->displayView('CoachingTest.index.php', array(
			'Coachings' => Coaching::findAll(NULL, array('key' => 'asc'))
		));
	}
	
	public function query($CoachingKey) {
		if (!$CoachingKey) return $this->index();
		
		return $this->displayView('CoachingTest.query.php', array(
			'product' => $CoachingKey
		));
	}
}