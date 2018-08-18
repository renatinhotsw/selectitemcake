<?php

class PostsModel extends Model {
    public $name = 'Post';

    public $validate = array(
        'title' => array(
          'rule' => 'notEmpty'
        ),
        'body' => array(
          'rule' => 'notEmpty'
        )
      );

}

 ?>
