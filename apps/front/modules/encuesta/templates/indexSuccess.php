<h1>Encuesta List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Encuestador</th>
      <th>Nombre</th>
      <th>Apellido p</th>
      <th>Apellido m</th>
      <th>Rfc</th>
      <th>Edad</th>
      <th>Genero</th>
      <th>Telefono</th>
      <th>Celular</th>
      <th>Email</th>
      <th>Estado</th>
      <th>Ciudad</th>
      <th>Municipio</th>
      <th>Colonia</th>
      <th>Calle</th>
      <th>Numero</th>
      <th>Cp</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($encuesta_list as $encuesta): ?>
    <tr>
      <td><a href="<?php echo url_for('encuesta_show', $encuesta) ?>"><?php echo $encuesta->getid() ?></a></td>
      <td><?php echo $encuesta->getencuestador_id() ?></td>
      <td><?php echo $encuesta->getnombre() ?></td>
      <td><?php echo $encuesta->getapellido_p() ?></td>
      <td><?php echo $encuesta->getapellido_m() ?></td>
      <td><?php echo $encuesta->getrfc() ?></td>
      <td><?php echo $encuesta->getedad() ?></td>
      <td><?php echo $encuesta->getgenero() ?></td>
      <td><?php echo $encuesta->gettelefono() ?></td>
      <td><?php echo $encuesta->getcelular() ?></td>
      <td><?php echo $encuesta->getemail() ?></td>
      <td><?php echo $encuesta->getestado_id() ?></td>
      <td><?php echo $encuesta->getciudad() ?></td>
      <td><?php echo $encuesta->getmunicipio() ?></td>
      <td><?php echo $encuesta->getcolonia() ?></td>
      <td><?php echo $encuesta->getcalle() ?></td>
      <td><?php echo $encuesta->getnumero() ?></td>
      <td><?php echo $encuesta->getcp() ?></td>
      <td><?php echo $encuesta->getcreated_at() ?></td>
      <td><?php echo $encuesta->getupdated_at() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('encuesta_new') ?>">New</a>
