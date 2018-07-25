<?php
App::uses('Model', 'Model');

class PostsModel extends Model {
    public $name = 'Post';
    
    public function initialize(array $config){
      $this->addBehavior('Timestamp');
    }

}

 ?>
