<h1>Posts do Blog</h1>
<br>
<br>
<br>
<h1> CLique  <?php echo $this->Html->link('Adicionar',
                            array('action'=>'add')
                          ); ?> para inserir um post
 </h1>


<table>
<tr>
  <th>Id</th>
  <th>Título</th>
  <th>Body</th>
  <th>Ação</th>
</tr>
<!-- Aqui é onde nós percorremos nossa matriz $posts, imprimindo
as informações dos posts -->
<?php foreach ($posts as $post): ?>
<tr>
  <td><?php echo $post['Post']['id']; ?></td>
  <td>
    <?php echo $this->Html->link($post['Post']['title'],
                array('action'=>'view',$post['Post']['id']));?>
  </td>
  <td>
    <?php echo $post['Post']['body']; ?>
  </td>
  <td>
    <?php echo $this->Html->link('Alterar',
                                array('action'=>'edit',$post['Post']['id'])
                                );
    ?>
  </td>

  <td>
    <?php echo $this->Form->postLink('Excluir',
                          array('action'=>'delete',$post['Post']['id']),
                          array('confirm'=> 'Você tem certeza que deseja apagá-lo ?')
                        );

    ?>
  </td>

</tr>
<?php endforeach; ?>
</table>
