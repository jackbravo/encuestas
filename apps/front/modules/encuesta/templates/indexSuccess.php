<h1>Encuestas</h1>

<div id="filters">
<form action="<?php echo url_for('@encuesta_filter') ?>" method="post">
  <?php echo $filter->renderGlobalErrors() ?>
  <?php echo $filter->renderHiddenFields() ?>

  <?php echo $filter['nombre']->renderRow() ?>
  <?php echo $filter['apellido_p']->renderRow() ?>
  <?php echo $filter['estado_id']->renderRow() ?>

  <input type="submit" value="Filtrar" />
  &nbsp;<?php echo link_to('Reset', '@encuesta_filter', array('query_string' => '_reset', 'method' => 'post')) ?>
</form>
</div>

<table class="list">
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Telefono</th>
      <th>Estado</th>
      <th>Encuestador</th>
      <th>Última actualización</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pager->getResults() as $i => $encuesta): ?>
    <tr class="<?php
        echo fmod($i,2) == 0 ? 'even' : 'odd';
      ?>">
      <td><?php echo link_to($encuesta->id, 'encuesta_show', $encuesta) ?></td>
      <td><?php echo link_to($encuesta->nombre . ' ' . $encuesta->apellido_p . ' ' . $encuesta->apellido_m, 'encuesta_show', $encuesta) ?></td>
      <td><?php echo $encuesta->telefono ?></td>
      <td><?php echo $encuesta->Estado ?></td>
      <td><?php echo $encuesta->Encuestador ?></td>
      <td><?php echo $encuesta->updated_at ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('encuesta_new') ?>">New</a>
