<h1>Editando o Post</h1>
<?php
  echo $this->Form->create('Post');
  echo $this->Form->input('title');
  echo $this->Form->input('body',array('rows'=>3));
  echo $this->Form->input('id',array('type'=>'hidden'));
  echo $this->Form->input('id_user',array('type'=>'hidden'));
  echo $this->Form->end('Alterar Post');


 ?>
