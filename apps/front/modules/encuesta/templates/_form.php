<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<?php echo form_tag_for($form, '@encuesta') ?>
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
  <?php echo $form['edad']->renderRow() ?>
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
  <?php echo $form['ciudad']->renderRow() ?>
  </div>
  <div class="grid_4">
  <?php echo $form['estado_id']->renderRow() ?>
  </div>
  <div class="grid_4">
  <?php echo $form['cp']->renderRow() ?>
  </div>
</fieldset>

<h4>Contacto</h4>
<fieldset>
  <div class="grid_4">
  <?php echo $form['telefono']->renderRow() ?>
  </div>
  <div class="grid_4">
  <?php echo $form['celular']->renderRow() ?>
  </div>
  <div class="grid_4">
  <?php echo $form['email']->renderRow() ?>
  </div>

  <div class="grid_12">
  <?php echo $form['horarios_list']->renderRow() ?>
  </div>
</fieldset>

<h4>Interés</h4>
<fieldset>
  <div class="grid_12">
  <?php echo $form['areas_interes_list']->renderRow() ?>
  <?php echo $form['productos_interes_list']->renderRow() ?>
  <?php echo $form['medios_contacto_list']->renderRow() ?>
  <?php echo $form['notas']->renderRow() ?>
  </div>
</fieldset>

  &nbsp;<a href="<?php echo url_for('encuesta') ?>">Cancel</a>
  <?php if (!$form->getObject()->isNew()): ?>
    &nbsp;<?php echo link_to('Borrar', 'encuesta_delete', $form->getObject(), array('method' => 'delete', 'confirm' => '¿Estás seguro?')) ?>
  <?php endif; ?>
  <input type="submit" value="Enviar" />
</form>
