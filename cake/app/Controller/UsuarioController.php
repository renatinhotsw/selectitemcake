<?php

class UsuarioController extends AppController{
		public $helpers = array("Form", "Html");

		

         function index(){
			$this -> set ("title", "Usuários");
			$usuarios = $this->Usuario->find('all');
			$this->set('usuarios',$usuarios);
		}//index

		
		
		public function adicionar() {	
        $this->set('title', 'Adicionar usuário');
 
        if ($this->request->is("post")) {
            $this->Usuario->create();
 
            if ($this->Usuario->saveAssociated($this->request->data)) {
                $this->Session->setFlash(__("Usuário salvo com sucesso."));
                $this->redirect(array("action" => '/index/'));
            } else {
                $this->Session->setFlash(__("Erro: não foi possível salvar o usuário."));
                $this->redirect(array("action" => '/adicionar/'));
            }
        }
     }//adicionar


        public function editar($id = NULL) {
        $this->set("title", "Editar Usuário");
        $this->Usuario->id = $id;
        if (!$this->Usuario->exists()) {
            throw new NotFoundException(__('Usuário não encontrado.'));
        }
 
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Usuario->saveAssociated($this->request->data)) {
                $this->Session->setFlash(__('Usuário alterado com sucesso.'));
                $this->redirect(array('action' => '/index/'));
            } else {
                $this->Session->setFlash(__('Erro: não foi possível salvar o usuário.'));
            }
        } else {
            $this->request->data = $this->Usuario->read(NULL, $id);
        }
    }


    public function excluir($id = NULL) {
        if (!$this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        $this->Usuario->id = $id;
        if (!$this->Usuario->exists()) {
            throw new NotFoundException(__('Usuário não encontrado.'));
        }
        if ($this->Usuario->delete()) {
            $this->Session->setFlash(__('Usuário excluído com sucesso.'));
            $this->redirect(array('action' => '/index/'));
        }
        $this->Session->setFlash(__('Erro: não foi possível excluir o usuário.'));
        $this->redirect(array('action' => '/index/'));
    }
	




}	//UsuarioController


?>