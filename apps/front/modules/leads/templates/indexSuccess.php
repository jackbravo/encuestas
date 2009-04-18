<div class="grid_9">
<h1>Leads sin TAB</h1>
<p class="help">Son leads a los que todavía no se les asigna un TAB team o que el TAB Team que se le asignó no ha sido localizado todavía.</p>

<table class="list">
  <thead>
    <tr>
      <th>Interacción #</th>
      <th>Nombre</th>
      <th>Estado</th>
      <th>Ciudad</th>
      <th>Fecha de Registro</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pager->getResults('array') as $i => $encuesta): ?>
    <tr class="<?php
        echo fmod($i,2) == 0 ? 'even' : 'odd';
      ?>">
      <td><?php echo link_to($encuesta['id'], '@encuesta_show?id=' . $encuesta['id']) ?></td>
      <td><?php echo link_to($encuesta['nombre'] . ' ' . $encuesta['apellido_p'] . ' ' . $encuesta['apellido_m'], '@encuesta_show?id=' . $encuesta['id']) ?></td>
      <td><?php echo $encuesta['Estado']['nombre'] ?></td>
      <td><?php echo $encuesta['Ciudad']['nombre'] ?></td>
      <td><?php echo $encuesta['created_at'] ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <div class="actions">
    <a href="<?php echo url_for('encuesta_new') ?>">Nueva encuesta</a>
  </div>
</div>

<div id="filters" class="grid_3">
<h2>Filtros</h2>
<form action="<?php echo url_for('@leads_filter') ?>" method="post">
  <?php echo $filter->renderGlobalErrors() ?>
  <?php echo $filter->renderHiddenFields() ?>

  <div class="form-item">
    <label for="_id">Interacción #</label><br/> <input type="text" id="_id" name="_id" size="7" />
  </div>
  <?php echo $filter['nombre']->renderRow() ?>
  <?php echo $filter['apellido_p']->renderRow() ?>
  <?php echo $filter['apellido_m']->renderRow() ?>
  <?php echo $filter['nacimiento']->renderRow() ?>
  <?php echo $filter['estado_id']->renderRow() ?>
  <?php echo $filter['ciudad_id']->renderRow() ?>
  <?php echo $filter['created_at']->renderRow() ?>

  <input type="submit" value="Filtrar" />
  &nbsp;<?php echo link_to('Quitar filtros', '@leads_filter', array('query_string' => '_reset', 'method' => 'post')) ?>
</form>
</div>
