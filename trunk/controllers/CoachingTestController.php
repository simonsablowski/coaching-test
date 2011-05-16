<?php

class CoachingTestController extends Controller {
	public function query($CoachingKey) {
		if (!$CoachingKey) return $this->displayView('CoachingTest.index.php');
		
		$this->displayView('CoachingTest.query.php', array(
			'product' => $CoachingKey
		));
	}
}