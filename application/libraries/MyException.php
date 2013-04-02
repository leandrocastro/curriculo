<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// --------------------------------------------------------------------
/**
* Classe para tratar exceções
*
* @return	Retorna a mensagem de erro
* @author 	Leandro Castro <leandrocastro@gmail.com>
* De acordo com as normas da PSR (https://github.com/php-fig/fig-standards/tree/master/accepted)
*/

class MyException extends Exception {

	public function errorMessage()
	{

		$log = date('d-m-Y H:i:s')
			   .' Erro na linha '.$this->getLine()
               .' em '.$this->getFile()
               .': <b>'.$this->getMessage()."\n";

       	$this->logErro($log);

        return $this->getMessage().' Tente novamente mais tarde. Se o problema persistir, entre em contato com socurriculo@socurriculo.com.br';
	}

	public function logErro($detalhes = '')
	{
		$ci =& get_instance();

		$ci->load->helper('file');

		@write_file('application/logs/logErro.txt', $detalhes, 'a+');
	}

}