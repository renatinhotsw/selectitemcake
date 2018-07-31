<?php
App::uses('Model', 'Model');

class UploadModel extends Model {
    public $name = 'Posts';

    public function beforeSave($options = array()){

        if(!empty($this->data['Posts']['foto']['name'])){
          $this-data['Posts']['foto'] = $this->upload($this->data['posts']['foto']);
        }else{
          unset($this->data['posts']['foto']);
        }

    }

    public function upload($imagem = array(), $dir = 'img'){
      $dir = WWW_ROOT.$dir.DS;

      if(($imagem['error']!=0)) and ($imagem['size']==0)){
        throw new NotImplenebtedException('Alguma coisa deu errado,'.$imagem['error']);

      }
    }


}

 ?>
