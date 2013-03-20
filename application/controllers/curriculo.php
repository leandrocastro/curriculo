<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curriculo extends CI_Controller {

	// --------------------------------------------------------------------
	/**
	* Método router invocado nas etapas do cadastro
	*
	* @return	Próximo formulário do processo de cadastro
	* @author 	Leandro Castro <leandrocastro@gmail.com>
	* De acordo com as normas da PSR (https://github.com/php-fig/fig-standards/tree/master/accepted)
	*/
	public function cadastrar($secao = NULL)
	{
		if (! $secao) {
			show_404();
		} else {
			
			switch ($secao) {
				case 'informacoes-basicas':
					$this->informacoesBasicas();
					break;

				case 'apresentacao':
					$this->apresentacao();
					break;

				case 'localizacao':
					$this->localizacao();
					break;

				case 'informacoes-pessoais':
					$this->informacoesPessoais();
					break;

				case 'cargo-pretendido':
					$this->cargoPretendido();
					break;

				case 'formacao':
					$this->formacao();
					break;

				case 'experiencia-profissional':
					$this->experienciaProfissional();
					break;

				case 'lingua-extrangeira':
					$this->linguaExtrangeira();
					break;

				case 'cursos-e-seminarios':
					$this->cursosSeminarios();
					break;

				default:
					show_404();
					break;
			}

		}
	}

	// --------------------------------------------------------------------
	/**
	* Primeira etapa do cadastro (1)
	*
	* @return	View do cadastro
	*/

	protected function informacoesBasicas()
	{
		$data['sidebarEtapas'] = sidebarEtapasCadastroCurriculo(1);
		$this->load->view('html_header', setHeader('Informações básicas teste'));
		$this->load->view('menu');
		$this->load->view('cadastroInformacoesBasicas', $data); //Será substituida
		$this->load->view('html_footer');
	}
}

/* End of file home.php */
/* Location: ./application/controllers/welcome.php */