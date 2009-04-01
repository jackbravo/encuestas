<h1>Asignar ID a <?php echo $form->getObject() ?></h1>

<form action="<?php echo url_for('@encuesta_updateId?id=' . $form->getObject()->id) ?>" method="post">
  <?php echo $form ?>
  <input type="submit" value="Enviar" />
</form>
