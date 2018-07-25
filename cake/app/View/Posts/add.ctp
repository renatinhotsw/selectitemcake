<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Adicionar Post</title>
    <h1>Adicionar Post</h1>
  </head>
  <body>
      <?php $this->Form->create();?>
      <?php echo $this->Form->input('path'); ?>
      <?php echo $this->Form->input('created'); ?>
      <?php echo $this->Form->input('modified'); ?>
        
      <div class="buttons clearfix">
        <button type="submit" class="positive">
        <span class="icon-wrapper"><img src="path/to/tickmark.png" alt="" title="" /></span>
            Save Item
      </button>
    </div>
    <?php
       $this->Form->end();
       ?>
  </body>
</html>
