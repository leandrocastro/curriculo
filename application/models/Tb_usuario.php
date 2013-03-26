<?php
/**
 * @Entity @Table(name="Tb_usuario")
 */
class Tb_usuario
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var string
     */
    protected $id;
 
    /**
     * @Column(type="string")
     * @var string
     */
    public $nome;
 
    /**
     * @Column(type="string")
     * @var string
     */
    public $email;
 
    public function getId()
    {
        return $this->id;
    }
 
    public function getEmail()
    {
        return $this->email;
    }
 
    public function setEmail($email)
    {
        $this->email = $email;
    }
 
    public function getNome() {
        return $this->nome;
    }
 
    public function setNome($nome) {
        $this->nome = $nome;
    }
}