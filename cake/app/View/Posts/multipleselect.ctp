<html>
  <head>
    <?php
        echo $this->Html->css('multi-select.css');
        echo $this->Html->script('jquery-3.3.1.min.js');
        echo $this->Html->script('jquery.multi-select.js');

     ?>

  </head>
  <body>

    <br>
    <br>
    <br>
    <br>
    <label for = "my-select">Lista de Atuações</label>
    <select multiple="multiple" id="my-select" name="my-select[]">
      <?php
        foreach ($posts as $post) {
          echo $post;
        ?>
        <option value = <?php echo $post['Post']['id'] ?> > <?php echo $post['Post']['title'] ?></option>
        <?php
        }
       ?>
    </select>
    <br>
    <br>
    <?php
      echo $this->Form->input('atuacao', array('id'=>'atuacao','label'=>'Atuações selecionadas'));

     ?>

     <a href='#' id='select-all'>select all</a>

<script type="text/javascript">

//ativa plugin multiselect
$('#my-select').multiSelect();
console.log($('#my-select').multiSelect());

jQuery('#my-select').on('change', function () {

  jQuery("#atuacao").val(jQuery("#my-select").val());
});



</script>

  <?php
    echo $this->Form->end('Salvar');

   ?>





  </body>
</html>
