<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		// Título da página
		$header['title'] = "Só Currículo - Cadastre seu currículo grátis e consiga um novo emprego";
		// Descrição página cabeçalho (meta)
		$header['descricao_header'] = 'Endereço ou coisas afim';
		// Palavras-chave (meta)
		$header['palavras_chave'] = 'currículos, emprego, vagas, oportunidades';

		$this->load->view('html_header', $header);
		$this->load->view('menu');
		$this->load->view('principal');
		$this->load->view('html_footer');
	}

}

/* End of file home.php */
/* Location: ./application/controllers/welcome.php */