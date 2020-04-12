<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

  public function __construct(){
    parent::__construct();
    $this->load->model("SitesModel");
  }

  public function index() {
    $this->view('home');
  }

  public function view(){
    $data['title'] = 'bmagario'; 
		
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('home', $data);
    $this->load->view('templates/pages/about', $data);
    $this->load->view('templates/pages/services', $data);
    $this->getSitesDB();
    $this->load->view('templates/pages/contact', $data);
    $this->load->view('templates/footer', $data);
  }
  

  public function getSitesDB(){
    $data['sites'] = $this->SitesModel->getSites();
      
    if(empty($data['sites'])) {
      show_404();
    }

    return $this->load->view('templates/pages/sites.php', $data);
  }
}
