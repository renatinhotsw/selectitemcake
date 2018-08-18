<?php
App::uses('AppController', 'Controller');

class PostsController extends AppController{
  public $helpers = array ('Html','Form','Flash');
  public $components = array('Flash');

  public function initialize(){
    parent::initialize();
    $this->loadModel('Posts');
  }

  public function beforeRender(){
    unset($this->data);
  }

  public function index(){
    $post = '';
    $this->set('posts', $this->Post->find('all'));

    if($this->request->is('post')){

    }else{
        $dados = $this->Post->find('all');
        $this->data = $dados;

    }
}

  public function add(){
    $this->Post->status = 0; //Adicionar
  //  debug($this->Post->status);

    if($this->request->is('post')){

      if($this->Post->save($this->request->data)){
          if($this->Post->status == 0){
            $this->Flash->sucess('Post salvo com sucesso!');
            $this->redirect(array('action'=>'index'));
          }

      }
    }
  }

  public function edit($id=null){
    $this->Post->status = 1; //Alterar
    $this->Post->id = $id;
  //  debug($this->Post->id);

    if($this->request->is('get')){
      $this->request->data = $this->Post->findById($id);
      //debug($this->request->data);
    }else{
        if($this->Post->save($this->request->data)){
          $this->Flash->sucess('Post alterado com sucesso');
          $this->redirect(array('action'=>'index'));
        }
    }
  }

  public function delete($id){
    $this->Post->id = $id; //id do post deletado

    //lança excecao se o usuario tentar apagar pelo método GET
    if(!$this->request->is('post')){
      throw new MethodNotAllowedException();
    }

    if($this->Post->delete($id)){
      $this->Flash->sucess('Post com id'.$id.' apagado com sucesso!');
      $this->redirect(array('action'=>'index'));
    }else{
      $this->Flash->error('Post com id '.$id.' não existe na base!');
    }
  }

  public function view($id = null){
  $data = $this->Post->findById($id);

  if(empty($data)){
      unset($data);
      $this->Flash->error('Post não encontrado na base!');

  }else{
      $this->set('post', $this->Post->findById($id));
  }

}

  public function multipleselect(){
    $posts = $this->Post->find('all', array(
       'fields' => array('Post.id','Post.title')

    ));
    $this->set('posts',$posts);


  }







}










 ?>
