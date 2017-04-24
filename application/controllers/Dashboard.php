<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
	public function __construct()
   {
   		parent::__construct();
        $this->load->library('Auth');
     	$this->auth->check(strtolower(get_class($this)));
        $this->load->library('session');
   }
	public function index()
	{
		$this->load->model("MenuModel", "menu");
		$this->load->model("ConfigModel", "config_model");

		$temp_menu = $this->menu->getMenu();
		$menudata = array(
			"menu" => $temp_menu
		);

		$this->load->view('common/header');
		$this->load->view('common/menu', $menudata);
		$this->load->view('dashboard/overview');
		$this->load->view('common/footer');
	}
}