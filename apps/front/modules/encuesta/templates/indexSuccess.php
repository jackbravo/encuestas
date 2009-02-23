<h1>Encuesta List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Apellido p</th>
      <th>Apellido m</th>
      <th>Telefono</th>
      <th>Estado</th>
      <th>Encuestador</th>
      <th>Última actualización</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($encuesta_list as $encuesta): ?>
    <tr>
      <td><a href="<?php echo url_for('encuesta_show', $encuesta) ?>"><?php echo $encuesta->getid() ?></a></td>
      <td><?php echo $encuesta->nombre ?></td>
      <td><?php echo $encuesta->apellido_p ?></td>
      <td><?php echo $encuesta->apellido_m ?></td>
      <td><?php echo $encuesta->telefono ?></td>
      <td><?php echo $encuesta->Estado ?></td>
      <td><?php echo $encuesta->Encuestador ?></td>
      <td><?php echo $encuesta->updated_at ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('encuesta_new') ?>">New</a>
