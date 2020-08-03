<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller
{

	public function index()
	{
		$this->load->view('front/inc/header');
		$this->load->view('front/home');
		$this->load->view('front/inc/footer');
	}

	public function blog_content()
	{
		$this->load->view('front/inc/header');
		$this->load->view('front/blog_content');
		$this->load->view('front/inc/footer');
	}
}
