<h1>TAB Team</h1>
<p class="help">Esta tabla muestra a todos los miembros del TAB team registrados en el sistema durante el momento de la consulta. Los distribuidores están ordenados de la misma manera en que se ordenan al solicitar un nuevo TAB team para un lead.</p>

<div id="filters">
<form action="<?php echo url_for('@distribuidor_filter') ?>" method="post">
  <?php echo $filter->renderGlobalErrors() ?>
  <?php echo $filter->renderHiddenFields() ?>

  <?php echo $filter['city']->renderRow() ?>
  <?php echo $filter['state']->renderRow() ?>

  <input type="submit" value="Filtrar" />
  &nbsp;<?php echo link_to('Quitar filtros', '@distribuidor_filter', array('query_string' => '_reset', 'method' => 'post')) ?>
</form>
</div>

<table class="list">
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Nivel</th>
      <th>Ciudad</th>
      <th>Estado</th>
      <th>Tally</th>
      <th>Desempeño</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pager->getResults('array') as $i => $distribuidor): ?>
    <tr class="<?php
        echo fmod($i,2) == 0 ? 'even' : 'odd';
      ?>">
      <td><?php echo link_to($distribuidor['id'], '@distribuidor_show?id=' . $distribuidor['id']) ?></td>
      <td><?php echo link_to($distribuidor['name'], '@distribuidor_show?id=' . $distribuidor['id']) ?></a></td>
      <td><?php echo $distribuidor['level'] ?></td>
      <td><?php echo $distribuidor['city'] ?></td>
      <td><?php echo $distribuidor['state'] ?></td>
      <td><?php echo $distribuidor['tally'] ?></td>
      <td><?php echo $distribuidor['performance'] ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

