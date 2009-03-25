<div class="grid_12">
<h1>Seguimiento</h1>

<table class="list">
  <caption>Segunda vuelta</caption>
  <thead>
    <tr>
      <th>Interacción #</th>
      <th>Nombre lead</th>
      <th>Nombre TAB</th>
      <th>Estado</th>
      <th>Ciudad</th>
      <th>Fecha de Localización</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($seguimientos2 as $i => $encuesta): ?>
    <tr class="<?php
        echo fmod($i,2) == 0 ? 'even' : 'odd';
        echo Encuesta::dentroDeHorario($encuesta['Horarios']) ? ' ok' : ' not-ok';
      ?>">
      <td><?php echo link_to($encuesta['id'], '@encuesta_show?id=' . $encuesta['id']) ?></td>
      <td><?php echo link_to($encuesta['nombre'] . ' ' . $encuesta['apellido_p'] . ' ' . $encuesta['apellido_m'], '@encuesta_show?id=' . $encuesta['id']) ?></td>
      <td><?php echo $encuesta['Seguimiento'][0]['Distribuidor']['name'] ?></td>
      <td><?php echo $encuesta['Estado']['nombre'] ?></td>
      <td><?php echo $encuesta['ciudad'] ?></td>
      <td><?php echo $encuesta['Seguimiento'][0]['fecha_localizo_dist'] ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<table class="list">
  <caption>Primera vuelta</caption>
  <thead>
    <tr>
      <th>Interacción #</th>
      <th>Nombre lead</th>
      <th>Nombre TAB</th>
      <th>Estado</th>
      <th>Ciudad</th>
      <th>Fecha de Localización</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($seguimientos1 as $i => $encuesta): ?>
    <tr class="<?php
        echo fmod($i,2) == 0 ? 'even' : 'odd';
        echo Encuesta::dentroDeHorario($encuesta['Horarios']) ? ' ok' : ' not-ok';
      ?>">
      <td><?php echo link_to($encuesta['id'], '@encuesta_show?id=' . $encuesta['id']) ?></td>
      <td><?php echo link_to($encuesta['nombre'] . ' ' . $encuesta['apellido_p'] . ' ' . $encuesta['apellido_m'], '@encuesta_show?id=' . $encuesta['id']) ?></td>
      <td><?php echo $encuesta['Seguimiento'][0]['Distribuidor']['name'] ?></td>
      <td><?php echo $encuesta['Estado']['nombre'] ?></td>
      <td><?php echo $encuesta['ciudad'] ?></td>
      <td><?php echo $encuesta['Seguimiento'][0]['fecha_localizo_dist'] ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
