<?php
	function setHeader($title = NULL)
	{
		$title = $title != NULL ? ' - '.$title : '';

		$header = array (	
							'title' => "Só Currículo".$title
							,'descricao_header' => 'Currículo e oportunidades de trabalho. Cadastre seu currículo ou encontre o profissional certo para sua empresa'
							,'palavras_chave'	=> 'currículos, emprego, vagas, oportunidades, encontrar profissional, trabalho'
						); 
		return $header;		
	}


	function sidebarEtapasCadastroCurriculo($select = NULL)
	{
		if (! $select) show_404();

		$return = htmlSidebarCadastro();

		for ($i=0; $i < 10; $i++) {

			if ($i == $select){

				$return = (str_replace('%'.$i.'%', '<strong>', $return));
				$return = (str_replace('%/'.$i.'%', '</strong>', $return));
			} else {

				$return = (str_replace('%'.$i.'%', '', $return));
				$return = (str_replace('%/'.$i.'%', '', $return));
			}
		}
		return $return;
	}


	function htmlSidebarCadastro()
	{
		$return =  '<div class="span3">
			          <div class="well sidebar-nav">
			            <ul class="nav nav-list">
			              <li class="nav-header">
			                <h5>
			                Etapas do cadastro
			                </h5>
			              </li>
			              <li class="">
			                <a href="/curriculo/cadastrar/informacoes-basicas">
			                  %1% Informações de usuário %/1%
			                </a>
			              </li>
			              <li class="">
			                <a href="/curriculo/cadastrar/apresentacao">
			                  %2% Apresentação %/2%
			                </a>
			              </li>
			              <li class="">
			                <a href="/curriculo/cadastrar/localizacao">
			                  %3% Localização %/3%
			                </a>
			                <a href="/curriculo/cadastrar/informacoes-pessoais">
			                  %4% Informações pessoais %/4%
			                </a>
			                <a href="/curriculo/cadastrar/cargo-pretendido">
			                  %5% Cargo pretendido %/5%
			                </a>
			                <a href="/curriculo/cadastrar/formacao">
			                  %6% Formação %/6%
			                </a>
			                <a href="/curriculo/cadastrar/experiencia-profissional">
			                  %7% Experiência profissional %/7%
			                </a>
			                <a href="/curriculo/cadastrar/lingua-estrangeira">
			                  %8% Lingua estrangeira %/8%
			                </a>
			                <a href="/curriculo/cadastrar/cursos-e-seminarios">
			                  %9% Cursos e seminários %/9%
			                </a>
			              </li>
			            </ul>
			          </div>
			        </div>';
        return $return;
	}

