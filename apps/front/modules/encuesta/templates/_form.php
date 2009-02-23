<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<?php echo form_tag_for($form, '@encuesta') ?>
  <?php echo $form->renderHiddenFields() ?>
  <?php echo $form->renderGlobalErrors() ?>

<fieldset>
  <legend>Datos</legend>
  <?php echo $form['nombre']->renderRow() ?>
  <?php echo $form['apellido_p']->renderRow() ?>
  <?php echo $form['apellido_m']->renderRow() ?>
  <?php echo $form['rfc']->renderRow() ?>
  <?php echo $form['edad']->renderRow() ?>
  <?php echo $form['genero']->renderRow() ?>
</fieldset>

<fieldset>
  <legend>Dirección</legend>
  <?php echo $form['calle']->renderRow() ?>
  <?php echo $form['numero']->renderRow() ?>
  <?php echo $form['colonia']->renderRow() ?>
  <?php echo $form['ciudad']->renderRow() ?>
  <?php echo $form['municipio']->renderRow() ?>
  <?php echo $form['estado_id']->renderRow() ?>
  <?php echo $form['cp']->renderRow() ?>
</fieldset>

<fieldset>
  <legend>Contacto</legend>
  <?php echo $form['telefono']->renderRow() ?>
  <?php echo $form['celular']->renderRow() ?>
  <?php echo $form['email']->renderRow() ?>
  <?php echo $form['horarios_list']->renderRow() ?>
</fieldset>

<fieldset>
  <legend>Interés</legend>
  <?php echo $form['areas_interes_list']->renderRow() ?>
  <?php echo $form['productos_interes_list']->renderRow() ?>
  <?php echo $form['medios_contacto_list']->renderRow() ?>
</fieldset>

  &nbsp;<a href="<?php echo url_for('encuesta') ?>">Cancel</a>
  <?php if (!$form->getObject()->isNew()): ?>
    &nbsp;<?php echo link_to('Delete', 'encuesta_delete', $form->getObject(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
  <?php endif; ?>
  <input type="submit" value="Save" />
</form>
