<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Posts do BLog</title>
  </head>
  <?php echo $this->Html->link('Add Post', array('controller'=>'posts','action'=>'add')) ?>
<table>
<tr>
  <th>id</th>
  <th>path</th>
  <th>created</th>
  <th>modified</th>
</tr>
  <?php foreach ($posts as $post): ?>

<tr>
  <td>

       <!--SELECT INPUT BD LISTO TODOS !-->

       <?php

            echo $this->Form->input('lista',
                        array('options'=>$posts,
                        'value' =>2

                      ));
        // NO VALUE EU ESPECIFICO O VALOR DO ITEM A SER SELECIONADO

        ?>

  </td>

</tr>
<?php endforeach; ?>


</table>

  <body>

  </body>
</html>
