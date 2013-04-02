<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {


	public function cadastrar($foto = '')
	{
		if( $_SERVER['REQUEST_METHOD'] == 'POST' )
		{
			$this->load->library('MyImage', array($this->input->post('img')));
			if($this->myimage->valida() == 'OK' )
			{
				echo $this->input->post('w');exit;
				$this->myimage->posicaoCrop( array($this->input->post('x')), array($this->input->post('y')) );
				$this->myimage->redimensiona( array($this->input->post('w')), array($this->input->post('h')), array('crop') );
				$this->myimage->grava( array($this->input->post('img')) );
			}
		}

	}
}