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

				case 'foto':
					$this->foto();
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

				case 'lingua-estrangeira':
					$this->linguaEstrangeira();
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

		$this->load->library('form_validation');

		if ($this->input->post())
		{
			$this->form_validation->set_rules('input-nome', 'Nome', 'trim|xss_clean|required|min_length[5]|max_length[100]');
			$this->form_validation->set_rules('input-email', 'Email', 'trim|xss_clean|valid_email|required|is_unique[tb_usuario.email]');
			$this->form_validation->set_rules('input-senha', 'Senha', 'trim|xss_clean|required|min_length[4]|max_length[100]');

			if (! $this->form_validation->run())
			{
				$data['validation'] = 'Ops! Algo está errado!';
			} 
			else 
			{
					$u = new Usuario_model();
					$nome = $this->input->post('input-nome');
					$email = $this->input->post('input-email');
					$senha = $this->input->post('input-senha');
					if ($u->setBasicas($nome, $email, $senha))
					{
						redirect('curriculo/cadastrar/apresentacao');
					}
			}	

		}
		$data['sidebarEtapas'] = sidebarEtapasCadastroCurriculo(1);
		$this->load->view('html_header', setHeader('Cadastro de informações básicas'));
		$this->load->view('menu');
		$this->load->view('cadastroInformacoesBasicas', $data);
		$this->load->view('html_footer');
	}

	protected function apresentacao()
	{

		$this->load->library('form_validation');

		if ($this->input->post())
		{
			$this->form_validation->set_rules('input-apresentacao', 'Apresentação', 'trim|xss_clean|required|min_length[10]|max_length[255]');	
			if (! $this->form_validation->run())
			{
				$data['validation'] = 'Ops! Algo está errado!';
				$data['tamanho'] = 250 - strlen($this->input->post('input-apresentacao')); // Redefinido contador javascript
			}
			else
			{
				$u = new Usuario_model();
				if ($u->setApresentacao($this->input->post('input-apresentacao')))
				{
					redirect('curriculo/cadastrar/localizacao');
				}
			}
		}

		$data['sidebarEtapas'] = sidebarEtapasCadastroCurriculo(2);
		$this->load->view('html_header', setHeader('Apresentação'));
		$this->load->view('menu');
		$this->load->view('cadastroApresentacao', $data); //Será substituida
		$this->load->view('html_footer');
	}

	protected function localizacao()
	{
		$this->load->library('form_validation');

		if ($this->input->post())
		{
			$this->form_validation->set_rules('input-cep', 'Cep', 'trim|xss_clean|required');
			$this->form_validation->set_rules('input-cidade', 'Cidade', 'trim|xss_clean|required|min_length[2]|max_length[100]');
			$this->form_validation->set_rules('input-estado', 'Estado', 'trim|xss_clean|required|min_length[2]|max_length[100]');
			$this->form_validation->set_rules('input-bairro', 'Bairro', 'trim|xss_clean|required|min_length[1]|max_length[100]');
			$this->form_validation->set_rules('input-rua', 'Rua', 'trim|xss_clean|required|min_length[1]|max_length[100]');
			$this->form_validation->set_rules('input-numero', 'Numero', 'trim|xss_clean');
			$this->form_validation->set_rules('input-complemento', 'Complemento', 'trim|xss_clean|max_length[50]');

			if (! $this->form_validation->run())
			{
				$data['validation'] = 'Ops! Algo está errado!';
			} 
			else 
			{
				$u = new Usuario_model();
									
				$dados = array
						(
							'cep' => $this->input->post('input-cep')
							,'cidade' => $this->input->post('input-cidade')
							,'estado' => $this->input->post('input-estado')
							,'bairro' => $this->input->post('input-bairro')
							,'rua' => $this->input->post('input-rua')
							,'numero' => $this->input->post('input-numero')
							,'complemento' => $this->input->post('input-complemento')
						);

				if ($u->setEndereco($dados))
				{
					redirect('curriculo/cadastrar/informacoes-pessoais');
				}
			}	

		}

		$data['sidebarEtapas'] = sidebarEtapasCadastroCurriculo(3);
		$this->load->view('html_header', setHeader('Localização'));
		$this->load->view('menu');
		$this->load->view('cadastroLocalizacao', $data); //Será substituida
		$this->load->view('html_footer');
	}

	protected function informacoesPessoais()
	{

		$this->load->library('form_validation');

		if ($this->input->post())
		{
			$this->form_validation->set_rules('input-telefone-residencial', 'Telefone Residencial', 'trim|xss_clean');
			$this->form_validation->set_rules('input-telefone-celular', 'Telefone Celular', 'trim|xss_clean');
			$this->form_validation->set_rules('input-dia', 'Dia', 'trim|xss_clean|required');
			$this->form_validation->set_rules('input-mes', 'Mês', 'trim|xss_clean|required');
			$this->form_validation->set_rules('input-ano', 'Ano', 'trim|xss_clean|required');
			$this->form_validation->set_rules('input-sexo', 'Sexo', 'trim|xss_clean');

			if (! $this->form_validation->run())
			{
				$data['validation'] = 'Ops! Algo está errado!';
			} 
			else 
			{
				$u = new Usuario_model();
				
				$nascimento = $this->input->post('input-ano').'-'.$this->input->post('input-mes').'-'.$this->input->post('input-dia');

				$dados = array
						(
							'telefone_residencial' => $this->input->post('input-telefone-residencial')
							,'telefone_celular' => $this->input->post('input-telefone-celular')
							,'nascimento' => $nascimento
							,'sexo' => $this->input->post('input-sexo')
						);

				if ($u->setInformacoesPessoais($dados))
				{
					redirect('curriculo/cadastrar/cargo-pretendido');
				}
			}	

		}
		$data['sidebarEtapas'] = sidebarEtapasCadastroCurriculo(4);
		$this->load->view('html_header', setHeader('Informações pessoais'));
		$this->load->view('menu');
		$this->load->view('cadastroInformacoesPessoais', $data); //Será substituida
		$this->load->view('html_footer');
	}

	protected function cargoPretendido()
	{

		$this->load->library('form_validation');

		if ($this->input->post())
		{
			$this->form_validation->set_rules('input-cargo1', 'Cargo 1', 'trim|xss_clean|required|min_length[2]|max_length[100]');
			$this->form_validation->set_rules('input-cargo2', 'Cargo 2', 'trim|xss_clean|min_length[2]|max_length[100]');
			$this->form_validation->set_rules('input-cargo3', 'Cargo 3', 'trim|xss_clean|min_length[2]|max_length[100]');

			if (! $this->form_validation->run())
			{
				$data['validation'] = 'Ops! Algo está errado!';
			} 
			else 
			{
				$u = new Usuario_model();
								
				$dados = array
						(
							'cargo1' => $this->input->post('input-cargo1')
							,'cargo2' => $this->input->post('input-cargo2')
							,'cargo3' => $this->input->post('input-cargo3')
						);

				if ($u->setCargo($dados))
				{
					redirect('curriculo/cadastrar/formacao');
				}
			}	
		}

		$data['sidebarEtapas'] = sidebarEtapasCadastroCurriculo(5);
		$this->load->view('html_header', setHeader('Cargo pretendido'));
		$this->load->view('menu');
		$this->load->view('cadastroCargoPretendido', $data); //Será substituida
		$this->load->view('html_footer');
	}

	protected function formacao()
	{
		$this->load->library('form_validation');

		$u = new Usuario_model();
		
		if ($this->input->post())
		{
			$this->form_validation->set_rules('input-escolaridade', 'Escolaridade', 'trim|xss_clean|required');
			$this->form_validation->set_rules('input-area', 'Área', 'trim|xss_clean');
			$this->form_validation->set_rules('input-inicio-mes', 'Mês', 'trim|required|xss_clean');
			$this->form_validation->set_rules('input-inicio-ano', 'Ano', 'trim|required|xss_clean');
			$this->form_validation->set_rules('input-fim-mes', 'Mês', 'trim|required|xss_clean');
			$this->form_validation->set_rules('input-fim-ano', 'Ano', 'trim|required|xss_clean');


			if (! $this->form_validation->run())
			{
				$data['validation'] = 'Ops! Algo está errado!';
			} 
			else 
			{
				$data_inicio = '';
				$data_fim = '';

				if ($this->input->post('input-inicio-ano') != '' && $this->input->post('input-inicio-mes')!= '' )
					$data_inicio = $this->input->post('input-inicio-ano').'-'.$this->input->post('input-inicio-mes').'-'.'01';
				
				if ($this->input->post('input-fim-ano') != '' && $this->input->post('input-fim-mes')!= '' )
					$data_fim = $this->input->post('input-fim-ano').'-'.$this->input->post('input-fim-mes').'-'.'01';

				$dados = array
				(
					'tipo_formacao' => $this->input->post('input-escolaridade')
					,'area_de_estudo' => $this->input->post('input-area')
					,'data_inicio' => $data_inicio
					,'data_fim' => $data_fim
					,'usuario_id' => getSession('id')
				);

				if ($u->setFormacao($dados))
				{
					redirect('curriculo/cadastrar/formacao');
				}
			}	
		}

		$data['formacoesCadastradas'] = $u->getFormacao();
		$data['sidebarEtapas'] = sidebarEtapasCadastroCurriculo(6);
		$this->load->view('html_header', setHeader('Formação acadêmica'));
		$this->load->view('menu');
		$this->load->view('cadastroFormacao', $data); //Será substituida
		$this->load->view('html_footer');
	}

	protected function experienciaProfissional()
	{
		$data['sidebarEtapas'] = sidebarEtapasCadastroCurriculo(7);
		$this->load->view('html_header', setHeader('Experiência profissional'));
		$this->load->view('menu');
		$this->load->view('cadastroExperienciaProfissional', $data); //Será substituida
		$this->load->view('html_footer');
	}

	protected function linguaEstrangeira()
	{
		$data['sidebarEtapas'] = sidebarEtapasCadastroCurriculo(8);
		$this->load->view('html_header', setHeader('Experiência profissional'));
		$this->load->view('menu');
		$this->load->view('cadastroLinguaEstrangeira', $data); //Será substituida
		$this->load->view('html_footer');
	}

	protected function cursosSeminarios()
	{
		$data['sidebarEtapas'] = sidebarEtapasCadastroCurriculo(9);
		$this->load->view('html_header', setHeader('Cursos e seminários'));
		$this->load->view('menu');
		$this->load->view('cadastroCursosSeminarios', $data); //Será substituida
		$this->load->view('html_footer');
	}


}

/* End of file home.php */
/* Location: ./application/controllers/welcome.php */