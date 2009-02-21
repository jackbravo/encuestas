<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<?php echo form_tag_for($form, '@encuesta') ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields() ?>
          &nbsp;<a href="<?php echo url_for('encuesta') ?>">Cancel</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'encuesta_delete', $form->getObject(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['encuestador_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['encuestador_id']->renderError() ?>
          <?php echo $form['encuestador_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['nombre']->renderLabel() ?></th>
        <td>
          <?php echo $form['nombre']->renderError() ?>
          <?php echo $form['nombre'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['apellido_p']->renderLabel() ?></th>
        <td>
          <?php echo $form['apellido_p']->renderError() ?>
          <?php echo $form['apellido_p'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['apellido_m']->renderLabel() ?></th>
        <td>
          <?php echo $form['apellido_m']->renderError() ?>
          <?php echo $form['apellido_m'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['rfc']->renderLabel() ?></th>
        <td>
          <?php echo $form['rfc']->renderError() ?>
          <?php echo $form['rfc'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['edad']->renderLabel() ?></th>
        <td>
          <?php echo $form['edad']->renderError() ?>
          <?php echo $form['edad'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['genero']->renderLabel() ?></th>
        <td>
          <?php echo $form['genero']->renderError() ?>
          <?php echo $form['genero'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['telefono']->renderLabel() ?></th>
        <td>
          <?php echo $form['telefono']->renderError() ?>
          <?php echo $form['telefono'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['celular']->renderLabel() ?></th>
        <td>
          <?php echo $form['celular']->renderError() ?>
          <?php echo $form['celular'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['email']->renderLabel() ?></th>
        <td>
          <?php echo $form['email']->renderError() ?>
          <?php echo $form['email'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['estado_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['estado_id']->renderError() ?>
          <?php echo $form['estado_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['ciudad']->renderLabel() ?></th>
        <td>
          <?php echo $form['ciudad']->renderError() ?>
          <?php echo $form['ciudad'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['delegacion']->renderLabel() ?></th>
        <td>
          <?php echo $form['delegacion']->renderError() ?>
          <?php echo $form['delegacion'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['municipio']->renderLabel() ?></th>
        <td>
          <?php echo $form['municipio']->renderError() ?>
          <?php echo $form['municipio'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['colonia']->renderLabel() ?></th>
        <td>
          <?php echo $form['colonia']->renderError() ?>
          <?php echo $form['colonia'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['calle']->renderLabel() ?></th>
        <td>
          <?php echo $form['calle']->renderError() ?>
          <?php echo $form['calle'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['numero']->renderLabel() ?></th>
        <td>
          <?php echo $form['numero']->renderError() ?>
          <?php echo $form['numero'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['cp']->renderLabel() ?></th>
        <td>
          <?php echo $form['cp']->renderError() ?>
          <?php echo $form['cp'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['created_at']->renderLabel() ?></th>
        <td>
          <?php echo $form['created_at']->renderError() ?>
          <?php echo $form['created_at'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['updated_at']->renderLabel() ?></th>
        <td>
          <?php echo $form['updated_at']->renderError() ?>
          <?php echo $form['updated_at'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
