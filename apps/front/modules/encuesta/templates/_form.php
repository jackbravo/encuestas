<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<?php echo form_tag_for($form, '@encuesta') ?>
  <?php echo $form->renderHiddenFields() ?>
  <?php echo $form->renderGlobalErrors() ?>

  <?php echo $form['nombre']->renderRow() ?>
  <?php echo $form['nombre']->renderRow() ?>
  <?php echo $form['rfc']->renderRow() ?>
  <?php echo $form['edad']->renderRow() ?>
  <?php echo $form['genero']->renderRow() ?>
  <?php echo $form['telefono']->renderRow() ?>
  <?php echo $form['celular']->renderRow() ?>
  <?php echo $form['email']->renderRow() ?>
  <?php echo $form['estado_id']->renderRow() ?>
  <?php echo $form['ciudad']->renderRow() ?>
  <?php echo $form['municipio']->renderRow() ?>
  <?php echo $form['colonia']->renderRow() ?>
  <?php echo $form['calle']->renderRow() ?>
  <?php echo $form['cp']->renderRow() ?>
  <?php echo $form['horarios_list']->renderRow() ?>
  <?php echo $form['areas_interes_list']->renderRow() ?>
  <?php echo $form['productos_interes_list']->renderRow() ?>
  <?php echo $form['medios_contacto_list']->renderRow() ?>

  &nbsp;<a href="<?php echo url_for('encuesta') ?>">Cancel</a>
  <?php if (!$form->getObject()->isNew()): ?>
    &nbsp;<?php echo link_to('Delete', 'encuesta_delete', $form->getObject(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
  <?php endif; ?>
  <input type="submit" value="Save" />
</form>
