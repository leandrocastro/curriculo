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
	* Etapas do cadastro
	* O numero referencia a etapa atual, inicia em 1 e finaliza em 9
	* @return	View do cadastro
	*/

	protected function informacoesBasicas()
	{
		$data['sidebarEtapas'] = sidebarEtapasCadastroCurriculo(1);
		$this->load->view('html_header', setHeader('Cadastro de informações básicas'));
		$this->load->view('menu');
		$this->load->view('cadastroInformacoesBasicas', $data); //Será substituida
		$this->load->view('html_footer');
	}

	protected function apresentacao()
	{
		$data['sidebarEtapas'] = sidebarEtapasCadastroCurriculo(2);
		$this->load->view('html_header', setHeader('Apresentação'));
		$this->load->view('menu');
		$this->load->view('cadastroApresentacao', $data); //Será substituida
		$this->load->view('html_footer');
	}

	protected function localizacao()
	{
		$data['sidebarEtapas'] = sidebarEtapasCadastroCurriculo(3);
		$this->load->view('html_header', setHeader('Localização'));
		$this->load->view('menu');
		$this->load->view('cadastroLocalizacao', $data); //Será substituida
		$this->load->view('html_footer');
	}

	protected function informacoesPessoais()
	{
		$data['sidebarEtapas'] = sidebarEtapasCadastroCurriculo(4);
		$this->load->view('html_header', setHeader('Informações pessoais'));
		$this->load->view('menu');
		$this->load->view('cadastroInformacoesPessoais', $data); //Será substituida
		$this->load->view('html_footer');
	}




}

/* End of file home.php */
/* Location: ./application/controllers/welcome.php */