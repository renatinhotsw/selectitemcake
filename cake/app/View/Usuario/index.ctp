<h4><?php echo $this->html->link('Adicionar',array('action'=>'adicionar' )); ?></h4>
    <table>
        <tr>
            <th style="width: 65px; text-align:center; ">Código</th>
            <th>Login</th>
            <th>Senha</th>
        </tr>

        <?php
            foreach ($usuarios as $usuario) {
        ?>     
            <tr>
                <td><?php echo $usuario['Usuario']['id']; ?></td>
                <td><?php echo $usuario['Usuario']['login']?></td>
                <td><?php echo $usuario['Usuario']['senha']?></td>
                <td><?php echo $this->Html->link('Editar', array('action'=>'editar', $usuario['Usuario']['id'] ) ); ?> |  <?php echo $this->Html->link('Excluir', array('action' =>'excluir', $usuario['Usuario']['id']),array('confirm' =>'confirma a exclusão do usuário?'));?>
            </tr>    

            <?php



        }

        ?>


    </table>