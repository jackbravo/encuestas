<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<h1>Editar Seguimiento</h1>

<?php echo form_tag_for($form, '@seguimiento') ?>

<?php echo $form->renderHiddenFields() ?>
<?php echo $form->renderGlobalErrors() ?>

<?php echo $form ?>

&nbsp;<a href="<?php echo url_for('seguimiento') ?>">Cancelar</a>
&nbsp;<?php echo link_to('Borrar', 'seguimiento_delete', $form->getObject(), array('method' => 'delete', 'confirm' => '¿Estás seguro?')) ?>
&nbsp;<input type="submit" value="Guardar" />

</form>
