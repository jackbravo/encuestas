<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<?php echo form_tag_for($form, '@distribuidor') ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields() ?>
          &nbsp;<a href="<?php echo url_for('distribuidor') ?>">Cancelar</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Borrar', 'distribuidor_delete', $form->getObject(), array('method' => 'delete', 'confirm' => '¿Estás seguro?')) ?>
          <?php endif; ?>
          <input type="submit" value="Enviar" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['name']->renderLabel() ?></th>
        <td>
          <?php echo $form['name']->renderError() ?>
          <?php echo $form['name'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['level']->renderLabel() ?></th>
        <td>
          <?php echo $form['level']->renderError() ?>
          <?php echo $form['level'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['city']->renderLabel() ?></th>
        <td>
          <?php echo $form['city']->renderError() ?>
          <?php echo $form['city'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['state']->renderLabel() ?></th>
        <td>
          <?php echo $form['state']->renderError() ?>
          <?php echo $form['state'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['contact1']->renderLabel() ?></th>
        <td>
          <?php echo $form['contact1']->renderError() ?>
          <?php echo $form['contact1'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['contact2']->renderLabel() ?></th>
        <td>
          <?php echo $form['contact2']->renderError() ?>
          <?php echo $form['contact2'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['contact3']->renderLabel() ?></th>
        <td>
          <?php echo $form['contact3']->renderError() ?>
          <?php echo $form['contact3'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['tally']->renderLabel() ?></th>
        <td>
          <?php echo $form['tally']->renderError() ?>
          <?php echo $form['tally'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['performance']->renderLabel() ?></th>
        <td>
          <?php echo $form['performance']->renderError() ?>
          <?php echo $form['performance'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['m1_vp']->renderLabel() ?></th>
        <td>
          <?php echo $form['m1_vp']->renderError() ?>
          <?php echo $form['m1_vp'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['m1_ro']->renderLabel() ?></th>
        <td>
          <?php echo $form['m1_ro']->renderError() ?>
          <?php echo $form['m1_ro'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['m2_vp']->renderLabel() ?></th>
        <td>
          <?php echo $form['m2_vp']->renderError() ?>
          <?php echo $form['m2_vp'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['m2_ro']->renderLabel() ?></th>
        <td>
          <?php echo $form['m2_ro']->renderError() ?>
          <?php echo $form['m2_ro'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['m3_vp']->renderLabel() ?></th>
        <td>
          <?php echo $form['m3_vp']->renderError() ?>
          <?php echo $form['m3_vp'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['m3_ro']->renderLabel() ?></th>
        <td>
          <?php echo $form['m3_ro']->renderError() ?>
          <?php echo $form['m3_ro'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['leads_list']->renderLabel() ?></th>
        <td>
          <?php echo $form['leads_list']->renderError() ?>
          <?php echo $form['leads_list'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
