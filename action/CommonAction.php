<?php
    session_start();
	abstract class CommonAction {
		
		public function __construct(){
			
		}
		
		public function execute() {
			
		
			$this->executeAction();
		}
		
		abstract protected function executeAction();
	}