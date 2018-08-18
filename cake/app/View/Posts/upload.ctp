<?php

echo $this->Form->create('uploads', array('enctype' => 'multipart/form-data'));
echo $this->Form->file('Post.foto');
echo $this->Form->input('enviar',array( 'type'=>'submit') );

echo $this->Form->end();

debugger::dump($this->data);


//debugger::dump($this->data['posts']['foto']['name']);



 ?>
