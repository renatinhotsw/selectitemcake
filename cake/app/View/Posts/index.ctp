<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Posts do BLog</title>
  </head>
<?php echo $this->Html->link('Add Post', array('controller'=>'posts','action'=>'add')); ?>

<table>
<tr>
  <th>id</th>
  <th>title</th>
  <th>body</th>
</tr>
  <?php foreach ($posts as $post): ?>
<tr>
  <td>
        <?php echo $post['Post']['id'] ?>

  </td>

  <td>
    <?php echo $post['Post']['title'] ?>
  </td>

  <td>
    <?php echo $post['Post']['body'] ?>
  </td>

</tr>

<?php endforeach; ?>


</table>

  <body>

  </body>
</html>
