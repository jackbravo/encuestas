<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<?php if ($form->getObject()->isNew()): ?>
  <form action="<?php echo url_for('@encuesta_create') ?>" method="post" >
<?php else: ?>
  <form action="<?php echo url_for('@encuesta_update?id=' . $form->getObject()->id) ?>" method="post" >
    <input type="hidden" name="sf_method" value="put" />
<?php endif; ?>

  <?php echo $form->renderHiddenFields() ?>
  <?php echo $form->renderGlobalErrors() ?>

<h4>Información Personal</h4>
<fieldset>
  <div class="grid_4">
  <?php echo $form['nombre']->renderRow() ?>
  </div>
  <div class="grid_4">
  <?php echo $form['apellido_p']->renderRow() ?>
  </div>
  <div class="grid_4">
  <?php echo $form['apellido_m']->renderRow() ?>
  </div>

  <div class="grid_4">
  <?php echo $form['nacimiento']->renderRow() ?>
  </div>
  <div class="grid_8">
  <?php echo $form['genero']->renderRow() ?>
  </div>
</fieldset>

<h4>Dirección</h4>
<fieldset>
  <div class="grid_4">
  <?php echo $form['calle']->renderRow() ?>
  </div>
  <div class="grid_4">
  <?php echo $form['numero']->renderRow() ?>
  </div>
  <div class="grid_4">
  <?php echo $form['colonia']->renderRow() ?>
  </div>

  <div class="grid_4">
  <?php echo $form['estado_id']->renderRow() ?>
  </div>
  <div class="grid_4">
  <?php echo $form['ciudad_id']->renderRow() ?>
  </div>
  <div class="grid_4">
  <?php echo $form['cp']->renderRow() ?>
  </div>
</fieldset>

<h4>Contacto</h4>
<fieldset>
  <div class="grid_12">
    <div class="grid_4 alpha">
      <?php echo $form['telefono1']->renderRow() ?>
    </div>
    <div class="grid_4">
      <?php echo $form['ext1']->renderRow() ?>
    </div>
    <div class="grid_4 omega">
      <?php echo $form['tel_tipo1']->renderRow() ?>
    </div>
  </div>
  <div class="grid_12">
    <div class="grid_4 alpha">
      <?php echo $form['telefono2']->renderRow() ?>
    </div>
    <div class="grid_4">
      <?php echo $form['ext2']->renderRow() ?>
    </div>
    <div class="grid_4 omega">
      <?php echo $form['tel_tipo2']->renderRow() ?>
    </div>
  </div>
  <div class="grid_12">
    <div class="grid_4 alpha">
      <?php echo $form['telefono3']->renderRow() ?>
    </div>
    <div class="grid_4">
      <?php echo $form['ext3']->renderRow() ?>
    </div>
    <div class="grid_4 omega">
      <?php echo $form['tel_tipo3']->renderRow() ?>
    </div>
  </div>
  <div class="grid_12">
    <?php echo $form['email']->renderRow() ?>
    <?php echo $form['horarios_list']->renderRow() ?>
  </div>
</fieldset>

<h4>Interés</h4>
<fieldset>
  <div class="grid_12">
  <?php echo $form['areas_interes_list']->renderRow() ?>
  <?php echo $form['productos_interes_list']->renderRow() ?>
  <?php echo $form['medio_contacto_id']->renderRow() ?>
  <?php echo $form['notas']->renderRow() ?>
  </div>
</fieldset>

<h4>Sólo para el agente</h4>
<fieldset>
  <div class="grid_12">
  <?php echo $form['origen_datos']->renderRow() ?>
  </div>
</fieldset>

  &nbsp;<a href="<?php echo url_for('@homepage') ?>">Cancelar</a>
  <?php if (!$form->getObject()->isNew()): ?>
    &nbsp;<?php echo link_to('Borrar', '@encuesta_delete?id=' . $form->getObject()->id, array('method' => 'delete', 'confirm' => '¿Estás seguro?')) ?>
  <?php endif; ?>
  <input type="submit" value="Enviar" />
</form>
