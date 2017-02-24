<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function index()
	{

		//$this->load->view('home');
		$data['title'] = "Page Title Priebas";		
		$data['base_url'] = base_url();			
		$data['editorials'] = $this->data_process();
		//print_r($data);

		$this->twig->parse('twig/home.html', $data);
	}

	public function data_process(){
		$json = json_decode(file_get_contents('/var/www/ProjectsPrivate/static/data/output.json'), true);
		foreach ($json as $id => $element) {
			if ($element['id'] % 2 == 0) {		
				$element['template']='thumb';
				$data['editorial'][$id] = $element;
			}else {
				$element['template']='pill';				
				$data['editorial'][$id] = $element;
			}			
		}
		return $data;	
	}
}
