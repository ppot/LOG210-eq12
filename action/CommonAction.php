<?php
    session_start();
	abstract class CommonAction {
		
		public function __construct($pageVisibility){
			
		}
		
		public function execute() {
			
		
			$this->executeAction();
		}
		
		abstract protected function executeAction();
	}