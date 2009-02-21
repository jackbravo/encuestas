<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $encuesta->getid() ?></td>
    </tr>
    <tr>
      <th>Encuestador:</th>
      <td><?php echo $encuesta->getencuestador_id() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $encuesta->getnombre() ?></td>
    </tr>
    <tr>
      <th>Apellido p:</th>
      <td><?php echo $encuesta->getapellido_p() ?></td>
    </tr>
    <tr>
      <th>Apellido m:</th>
      <td><?php echo $encuesta->getapellido_m() ?></td>
    </tr>
    <tr>
      <th>Rfc:</th>
      <td><?php echo $encuesta->getrfc() ?></td>
    </tr>
    <tr>
      <th>Edad:</th>
      <td><?php echo $encuesta->getedad() ?></td>
    </tr>
    <tr>
      <th>Genero:</th>
      <td><?php echo $encuesta->getgenero() ?></td>
    </tr>
    <tr>
      <th>Telefono:</th>
      <td><?php echo $encuesta->gettelefono() ?></td>
    </tr>
    <tr>
      <th>Celular:</th>
      <td><?php echo $encuesta->getcelular() ?></td>
    </tr>
    <tr>
      <th>Email:</th>
      <td><?php echo $encuesta->getemail() ?></td>
    </tr>
    <tr>
      <th>Estado:</th>
      <td><?php echo $encuesta->getestado_id() ?></td>
    </tr>
    <tr>
      <th>Ciudad:</th>
      <td><?php echo $encuesta->getciudad() ?></td>
    </tr>
    <tr>
      <th>Delegacion:</th>
      <td><?php echo $encuesta->getdelegacion() ?></td>
    </tr>
    <tr>
      <th>Municipio:</th>
      <td><?php echo $encuesta->getmunicipio() ?></td>
    </tr>
    <tr>
      <th>Colonia:</th>
      <td><?php echo $encuesta->getcolonia() ?></td>
    </tr>
    <tr>
      <th>Calle:</th>
      <td><?php echo $encuesta->getcalle() ?></td>
    </tr>
    <tr>
      <th>Numero:</th>
      <td><?php echo $encuesta->getnumero() ?></td>
    </tr>
    <tr>
      <th>Cp:</th>
      <td><?php echo $encuesta->getcp() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $encuesta->getcreated_at() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $encuesta->getupdated_at() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('encuesta_edit', $encuesta) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('encuesta') ?>">List</a>
