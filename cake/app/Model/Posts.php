<?php
App::uses('Model', 'Model');

class PostsModel extends Model {
    public $name = 'Post';

    public function initialize(array $config){
      $this->addBehavior('Timestamp');
    }


    public function beforeSave($options = array()){
        debugger::dump($this->data);
        die();

      if(!empty($this->data['Post']['foto']['name'])) {
         $this->data['Post']['foto'] = $this->upload($this->data['Post']['foto']);
     } else {
         unset($this->data['Post']['foto']);
     }

    }

    public function upload($imagem = array(), $dir = 'img')
{
    $dir = WWW_ROOT.$dir.DS;

    if(($imagem['error']!=0) and ($imagem['size']==0)) {
        throw new NotImplementedException('Alguma coisa deu errado, o upload retornou erro '.$imagem['error'].' e tamanho '.$imagem['size']);
    }

    $this->checa_dir($dir);

    $imagem = $this->checa_nome($imagem, $dir);

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


}

 ?>
