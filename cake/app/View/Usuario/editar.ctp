<?php
echo $this->Form->create('Usuario');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->input('login');
echo $this->Form->input('senha', array('type'=> 'password'));
echo $this->Form->input('Alterar', array('type' => 'submit', 'label' => FALSE));
echo $this->Form->end();
?>