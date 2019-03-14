<?php
//test-survey-list.php
//include_once 'includes/settings.php';
require_once 'simpletest/autorun.php';
require_once 'simpletest/web_tester.php';

class TestSurveyList extends WebTestCase {

	  function testSurveyListPage() {
		$this->get(VIRTUAL_PATH . 'http://www.derekheducation.dreamhosters.com/itc250/wn19app/surveys/');
		$this->assertResponse(200);
		$this->assertText("Spacely Sprockets");
	}

}