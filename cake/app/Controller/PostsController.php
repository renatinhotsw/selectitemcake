<?php
App::uses('AppController', 'Controller');

class PostsController extends AppController{
  public $helpers = array ('Html','Form');
  public $name = 'Posts';


  public function initialize(){
    parent::initialize();
    $this->loadModel('Posts');
  }


  public function index(){
    $post = '';

   $posts = $this->set('posts',$this->Post->find('list', array(
        'fields' => array('Post.id','Post.name')
    )));



    if($this->request->is('post')){


    }else{
      print('GET');

        $dados = $this->Post->find('all');
        $this->data = $dados;

       debugger::dump($this->data);
    
    }



}

  public function view($id = null){
      $this->set('post',$this->Post->findById($id));
  }

  public function add(){
    if($this->request->is('post')){
        if($this->Post->save($this->request->data)){
          $this->Flash->sucess('Post adicionado com sucesso!');
          $this->redirect(array('action' => 'index'));
        }
    }
  }



}










 ?>
