<?php
App::uses('AppController', 'Controller');

class PostsController extends AppController{
  public $helpers = array ('Html','Form','Flash');
  public $components = array('Flash');

  public function initialize(){
    parent::initialize();
    $this->loadModel('Posts');
  }

  public function index(){
    $post = '';

    $this->set('posts', $this->Post->find('all'));

    if($this->request->is('post')){

    }else{
      print('GET');
        $dados = $this->Post->find('all');
        $this->data = $dados;
        debugger::dump($this->data);
    }
}

  public function view($id = null){
  $data = $this->Post->findById($id);

  if(empty($data)){
      $this->Flash->error('Post não encontrado na base!');
  }else{
      $this->set('post', $this->Post->findById($id));
  }

  }

  public function add(){
    debug($this->request->data);
    if($this->request->is('post')){
      if($this->Post->save($this->request->data)){
        $this->Flash->sucess('Post salvo com sucesso!');
        $this->redirect(array('action'=>'index'));
      }
    }
  }

  public function edit($id=null){
    $this->Post->id = $id;

    if($this->request->is('get')){
      $this->request->data = $this->Post->findById($id);
      debug($this->request->data);
    }else{
        if($this->Post->sava($this->request->data)){
          $this->Flash->sucess('Post alterado com sucesso');
          $this->redirect(array('action'=>'index'));
        }
    }
  }





}










 ?>
