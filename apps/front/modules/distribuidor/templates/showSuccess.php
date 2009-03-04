<h2>
  <?php echo $distribuidor->id . ': ' . $distribuidor->name ?>
</h2>
<?php echo $distribuidor->city . ', ' . $distribuidor->state ?>

<hr/>

<strong>Nivel: </strong><?php echo $distribuidor->level ?><br/>
<strong>Contacto 1: </strong><?php echo $distribuidor->contact1 ?><br/>
<strong>Contacto 2: </strong><?php echo $distribuidor->contact2 ?><br/>
<strong>Contacto 3: </strong><?php echo $distribuidor->contact3 ?><br/>

<?php if ($sf_user->hasCredential('admin')): ?>
  <br/>

  <strong>Tally: </strong><?php echo $distribuidor->tally ?><br/>
  <strong>Desempeño: </strong><?php echo $distribuidor->performance ?><br/>

  <br/>

  <strong>Mes 1</strong><br/>
  VP: <?php echo $distribuidor->m1_vp ?><br/>
  RO: <?php echo $distribuidor->m1_ro ?><br/>
  <strong>Mes 2</strong><br/>
  VP: <?php echo $distribuidor->m2_vp ?><br/>
  RO: <?php echo $distribuidor->m2_ro ?><br/>
  <strong>Mes 3</strong><br/>
  VP: <?php echo $distribuidor->m3_vp ?><br/>
  RO: <?php echo $distribuidor->m3_ro ?><br/>
<?php endif ?>

<hr />

<h3>Leads asignados</h3>
<?php foreach ($distribuidor->Encuestas as $lead): ?>
<ul>
  <li><?php echo link_to("#$lead->id, $lead->nombre", 'encuesta_show', $lead) ?></li>
</ul>
<?php endforeach ?>

<hr />

<?php if ($sf_user->hasCredential('admin')): ?>
  <a href="<?php echo url_for('distribuidor_edit', $distribuidor) ?>">Editar</a>
  &nbsp;
<?php endif; ?>
<a href="<?php echo url_for('distribuidor') ?>">Lista</a>
