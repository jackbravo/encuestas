<h1>Distribuidores</h1>

<div id="filters">
<form action="<?php echo url_for('@distribuidor_filter') ?>" method="post">
  <?php echo $filter->renderGlobalErrors() ?>
  <?php echo $filter->renderHiddenFields() ?>

  <?php echo $filter['city']->renderRow() ?>
  <?php echo $filter['state']->renderRow() ?>

  <input type="submit" value="Filtrar" />
  &nbsp;<?php echo link_to('Reset', '@distribuidor_filter', array('query_string' => '_reset', 'method' => 'post')) ?>
</form>
</div>

<table class="list">
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Level</th>
      <th>City</th>
      <th>State</th>
      <th>Tally</th>
      <th>Performance</th>
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

