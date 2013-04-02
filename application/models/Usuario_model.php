<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	private $id;

	public function __construct() {
		parent::__construct();
	}

	public function setId($id = '')
	{
		try
		{
			if (empty($id) || ! is_numeric($id))
				throw new MyException('Foi enviado um parametro invalido.');

			$this->id = $id;
		}
		catch (MyException $e) 
		{
			echo $e->errorMessage();
		}	
	}

	public function getInfo($data = '')
	{
		try
		{
			if (! $data || ! getSession('id'))
			{
				throw new MyException('Foi enviado um parametro invalido.');
			}
			else
			{
				$this->db->select($data)
				->from('tb_usuario')
				->where('id', getSession('id'));
				$return = $this->db->get()->result_array();
                if (count($return) == 0)
				{
					throw new MyException('Usuario inexistente.');
				}
                else
                {
                    return $return[0][$data];
                }
			}
		}
		catch (MyException $e) 
		{
		  echo $e->errorMessage();
		}	
	}

    public function setBasicas($nome, $email, $senha)
    {
        try
        {
            if (! $nome || ! $email || ! $senha )
            {
                throw new MyException('Falta parametros para inclusao.');
            }
            else
            {
                $data = array 
                (
                    'nome' => $nome
                    ,'email' => $email
                    ,'senha' => sha1($senha)
                );

                if (! $this->db->insert('Tb_usuario', $data))
                {
                    throw new MyException('Erro na inclusao dos dados.');
                }
                else
                {
                	$this->load->library('session');
                	$newdata = array(
                   		'nome'  => $nome
                   		,'email'     => $email
                   		,'id' => $this->db->insert_id()
               		);

					$this->session->set_userdata($newdata);
                    return TRUE;
                } 

            }
        }
        catch (MyException $e) 
        {
          echo $e->errorMessage();
        }   
    }

    public function setApresentacao($apresentacao)
    {
        try
        {
        	if (! $apresentacao || ! getSession('id'))
            {
                throw new MyException('Falta parametros para inclusao.');
            }
            else
            {
            	$data = array
            	(
	               'apresentacao' => $apresentacao,
           		);

				$this->db->where('id', getSession('id'));

				if (! $this->db->update('Tb_usuario', $data))
				{
					throw new MyException("Erro na inclusão dos dados");
				}
				else
				{
					return TRUE;
				}
			}
		}
        catch (MyException $e) 
        {
          echo $e->errorMessage();
        }

	}

	public function setEndereco(array $dados)
	{
		try
        {
        	if (! $dados || ! getSession('id'))
            {
                throw new MyException('Falta parametros para inclusao do endereco.');
            }
            else
            {
				$this->db->where('id', getSession('id'));

				if (! $this->db->update('Tb_usuario', $dados))
				{
					throw new MyException("Erro na inclusão dos dados");
				}
				else
				{
					return TRUE;
				}
			}
		}
        catch (MyException $e) 
        {
          echo $e->errorMessage();
        }

	}

	public function setInformacoesPessoais(array $dados)
	{
		try
        {
        	if (! $dados || ! getSession('id'))
            {
                throw new MyException('Falta parametros para inclusao.');
            }
            else
            {

            	if (! empty($dados['telefone_residencial']))
            	{
					$data = array 
	                (
	                    'telefone' => $dados['telefone_residencial']
	                    ,'tipo' => 'r'
	                    ,'usuario_id' => getSession('id')
	                );

	                if (! $this->db->insert('Tb_telefone', $data))
	                {
	                	throw new MyException('Erro na inclusao dos dados.');
	                }
            	}
            	if (! empty($dados['telefone_celular']))
            	{
					$data = array 
	                (
	                    'telefone' => $dados['telefone_celular']
	                    ,'tipo' => 'c'
	                    ,'usuario_id' => getSession('id')
	                );

	                if (! $this->db->insert('Tb_telefone', $data))
	                {
	                	throw new MyException('Erro na inclusao dos dados.');
	                }
            	}
            	$dados = array
            	(
        			'sexo' => $dados['sexo']
        			,'nascimento' => $dados['nascimento']
        		);

            	$this->db->where('id', getSession('id'));
				if (! $this->db->update('Tb_usuario', $dados))
				{
					throw new MyException("Erro na inclusao dos dados");
				}
				else
				{
					return TRUE;
				}
			}
		}
        catch (MyException $e) 
        {
          echo $e->errorMessage();
        }
    }


    public function setCargo(array $dados)
    {
		try
        {
        	$return = FALSE;
        	if (! $dados || ! getSession('id'))
            {
                throw new MyException('Falta parametros para inclusao.');
            }
            else
            {
            	for ($i=1; $i <= count($dados) ; $i++) 
            	{ 
            		if (! empty($dados['cargo'.$i]))
            		{
	            		$data = array 
		                (
		                    'cargo' => $dados['cargo'.$i]
		                    ,'usuario_id' => getSession('id')
		                );

		                if (! $this->db->insert('Tb_cargo', $data))
		                {
		                	throw new MyException('Erro na inclusao dos dados.');
		                }
		                else
		                {
		                	$return = TRUE;
		                }
	            	}
            	}
			}
			return $return;
		}
        catch (MyException $e) 
        {
          echo $e->errorMessage();
        }

    }

    public function setFormacao(array $dados)
    {
		try
        {
        	$return = FALSE;
        	if (! $dados || ! getSession('id'))
            {
                throw new MyException('Falta parametros para inclusao.');
            }
            else
            {
	            if (! $this->db->insert('Tb_formacao', $dados))
	            {
	            	throw new MyException('Erro na inclusao dos dados.');
	            }
	            else
	            {
	            	$return = TRUE;
	            }
	     
			}
			return $return;
		}
        catch (MyException $e) 
        {
          echo $e->errorMessage();
        }
    }

    public function getFormacao()
    {
    	try
        {
        	if (! getSession('id'))
            {


            }

        }
        catch (MyException $e) 
        {
          echo $e->errorMessage();
        }

    }



}

