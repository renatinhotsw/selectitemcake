<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Adicionar Post</title>
    <h1>Adicionar Post</h1>
  </head>
  <body>
      <?php
        echo $this->Form->create('Post');
        echo $this->Form->input('title');
        echo $this->Form->input('body',array('rows'=>3));
        echo $this->Form->input('id_user',array('type'=>'number'));
        echo $this->Form->end('Salvar');
       ?>
  </body>
</html>
