<?php
App::uses('AppController', 'Controller');

class PostsController extends AppController{
  public $helpers = array ('Html','Form');
  public $name = 'Posts';


  public function initialize(){
    parent::initialize();
    $this->loadModel('Posts');
  }

  public function beforeSave($options = array())
{

		if(!empty($this->data['Post']['foto']['name'])) {
        $this->data['Post']['foto'] = $this->upload($this->data['Post']['foto']['name']);
        
    } else {
        unset($this->data['Post']['foto']);
    }
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


    public function upload($file = array(), $dir = 'img')
{

    $dir = WWW_ROOT.$dir.'/upload_folder'.DS;
    debugger::dump($dir);

    if(($this->data['Post']['foto']['error']!=0) and ($this->data['Post']['foto']['size']==0)) {
        throw new NotImplementedException('Alguma coisa deu errado, o upload retornou erro '.$this->data['Post']['error'].' e tamanho '.$this->data['Post']['foto']['size']);
    }

    $this->checa_dir($dir);

    $imagem = $this->checa_nome($this->data['Post']['foto'], $dir);

    $this->move_arquivos($imagem, $dir);

    return $imagem['name'];
}

public function checa_dir($dir)
{
    App::uses('Folder', 'Utility');
    $folder = new Folder();
    if (!is_dir($dir)){
        $folder->create($dir);
    }
}

public function checa_nome($imagem, $dir)
{
    debugger::dump( $imagem);
    $imagem_info = pathinfo($dir.$imagem['name']);
    $imagem_nome = $this->trata_nome($imagem_info['filename']).'.'.$imagem_info['extension'];
    debug($imagem_nome);
    $conta = 2;
    while (file_exists($dir.$imagem_nome)) {
        $imagem_nome  = $this->trata_nome($imagem_info['filename']).'-'.$conta;
        $imagem_nome .= '.'.$imagem_info['extension'];
        $conta++;
        debug($imagem_nome);
    }
    $imagem['name'] = $imagem_nome;
    return $imagem;
}

public function trata_nome($imagem_nome)
{
    $imagem_nome = strtolower(Inflector::slug($imagem_nome,'-'));
    return $imagem_nome;
}

public function move_arquivos($imagem, $dir)
{
    App::uses('File', 'Utility');
    $arquivo = new File($imagem['tmp_name']);
    $arquivo->copy($dir.$imagem['name']);
    $arquivo->close();

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
