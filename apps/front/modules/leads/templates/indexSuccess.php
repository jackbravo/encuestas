<h1>Leads sin Distribuidor</h1>

<div id="filters">
<form action="<?php echo url_for('@leads_filter') ?>" method="post">
  <?php echo $filter->renderGlobalErrors() ?>
  <?php echo $filter->renderHiddenFields() ?>

  <label for="_id">Id</label> <input type="text" id="_id" name="_id" size="7" />
  <?php echo $filter['nombre']->renderRow() ?>
  <?php echo $filter['apellido_p']->renderRow() ?>
  <?php echo $filter['estado_id']->renderRow() ?>

  <input type="submit" value="Filtrar" />
  &nbsp;<?php echo link_to('Reset', '@leads_filter', array('query_string' => '_reset', 'method' => 'post')) ?>
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
    <?php foreach ($pager->getResults('array') as $i => $encuesta): ?>
    <tr class="<?php
        echo fmod($i,2) == 0 ? 'even' : 'odd';
      ?>">
      <td><?php echo link_to($encuesta['id'], '@encuesta_show?id=' . $encuesta['id']) ?></td>
      <td><?php echo link_to($encuesta['nombre'] . ' ' . $encuesta['apellido_p'] . ' ' . $encuesta['apellido_m'], '@encuesta_show?id=' . $encuesta['id']) ?></td>
      <td><?php echo $encuesta['telefono'] ?></td>
      <td><?php echo $encuesta['Estado']['nombre'] ?></td>
      <td><?php echo $encuesta['Encuestador']['username'] ?></td>
      <td><?php echo $encuesta['updated_at'] ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<a href="<?php echo url_for('encuesta_new') ?>">Nueva encuesta</a>
