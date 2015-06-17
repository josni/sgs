<?php

class Retorno{

	private $status;
	private $mensagem;
	private $mensagemException;

	public function Retorno(){

	}

	public function getStatus(){
		return $this->status;
	}
	public function getMensagem(){
		return $this->mensagem;
	}
	public function getMensagemException(){
		return $this->mensagemException;
	}
	public function setStatus($_status){
		$this->status = $_status;
	}
	public function setMensagem($_mensagem){
		$this->mensagem = $_mensagem;
	}
	public function setMensagemException($_mensagemException){
		$this->mensagemException = $_mensagemException;
	}
}