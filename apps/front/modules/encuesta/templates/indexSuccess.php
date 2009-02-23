<h1>Encuestas</h1>

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
    <?php foreach ($encuesta_list as $i => $encuesta): ?>
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
