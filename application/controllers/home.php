<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	// --------------------------------------------------------------------
	/**
	* Método principal chamado ao acessar a página principal
	*
	* @return	view principal
	* @author 	Leandro Castro <leandrocastro@gmail.com>
	*/
	public function index()
	{
		$this->load->view('html_header', setHeader('Cadastre seu currículo grátis e consiga um novo emprego'));
		$this->load->view('menu');
		$this->load->view('principal');
		$this->load->view('html_footer');
	}

}

/* End of file home.php */
/* Location: ./application/controllers/welcome.php */