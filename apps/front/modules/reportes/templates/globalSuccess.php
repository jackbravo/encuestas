<?php echo pack("CCC",0xef,0xbb,0xbf); // BOM para UTF-8 ?>
registro,nombre,"Apellido Paterno","Apellido Materno","Fecha de Nacimiento","Género",Calle,Número,Colonia,"Ciudad/Población",Estado,CP,tel 1,ext 1,tel tipo 1,tel 2,ext 2,tel tipo 2,tel 3,ext 3,tel tipo 3,email,mejor horario para contactarte,interesado en distribuir,interesado en comprar,nutricion interna,nutricion externa,como se entero de este numero,notas,origen datos,fecha registro,agente registro,ID dist,fecha de asignacion ID dist,agente que asigno el ID dist,num intentos de asignaciones,<?php
foreach (range(1,5) as $i)
{
  echo "nombre tab $i,id tab $i,rango tab $i,estado tab $i,ciudad tab $i,contacto 1 tab $i,contacto 2 tab $i,contacto 3 tab $i,fecha de intento de asignacion $i,se contacto al tab $i,fecha contacto tab $i,agente contacto tab $i,se contacto al lead $i,fecha contacto lead $i,agente contacto lead $i,notas $i,num vuelta $i,";
}

function print_bool($bool) {
  if ($bool === NULL) {
    return '';
  } else if ($bool) {
    return '1';
  } else {
    return '0';
  }
}

echo "\r\n";

foreach ($registros as $reg)
{
  echo '"' . $reg['id'] . '",';
  echo '"' . $reg['nombre'] . '",';
  echo '"' . $reg['apellido_p'] . '",';
  echo '"' . $reg['apellido_m'] . '",';
  echo '"' . $reg['nacimiento'] . '",';
  echo '"' . $reg['genero'] . '",';
  echo '"' . $reg['calle'] . '",';
  echo '"' . $reg['numero'] . '",';
  echo '"' . $reg['colonia'] . '",';
  echo '"' . $reg['Ciudad']['nombre'] . '",';
  echo '"' . $reg['Estado']['nombre'] . '",';
  echo '"' . $reg['cp'] . '",';
  echo '"' . $reg['telefono1'] . '",';
  echo '"' . $reg['ext1'] . '",';
  echo '"' . Encuesta::getTipoString($reg['tel_tipo1']) . '",';
  echo '"' . $reg['telefono2'] . '",';
  echo '"' . $reg['ext2'] . '",';
  echo '"' . Encuesta::getTipoString($reg['tel_tipo2']) . '",';
  echo '"' . $reg['telefono3'] . '",';
  echo '"' . $reg['ext3'] . '",';
  echo '"' . Encuesta::getTipoString($reg['tel_tipo3']) . '",';
  echo '"' . $reg['email'] . '",';
  echo '"' . $reg['rangos_horario'] . '",';
  foreach ($reg['AreasInteres'] as $area) {
    if ($area['id'] == 1) echo "1";
  }
  echo ",";
  foreach ($reg['AreasInteres'] as $area) {
    if ($area['id'] == 2) echo "1";
  }
  echo ",";
  foreach ($reg['ProductosInteres'] as $prod) {
    if ($prod['id'] == 1) echo "1";
  }
  echo ",";
  foreach ($reg['ProductosInteres'] as $prod) {
    if ($prod['id'] == 2) echo "1";
  }
  echo ",";
  echo '"' . $reg['MedioContacto']['descripcion'] . '",';
  echo '"' . str_replace(array("\r\n", '"'), array("\n", "'"), $reg['notas']) . '",';
  echo '"' . ($reg['origen_datos'] == 1 ? 'tel' : 'mail') . '",';
  echo '"' . $reg['created_at'] . '",';
  echo '"' . $reg['Agente']['username'] . '",';
  echo '"' . $reg['my_dist_id'] . '",';
  echo '"' . $reg['fecha_my_dist_id'] . '",';
  echo '"' . $reg['AgenteDistId']['username'] . '",';

  echo '"' . sizeof($reg['Seguimiento']) . '",';

  foreach ($reg['Seguimiento'] as $seg) {
    echo '"' . $seg['Distribuidor']['name'] . '",';
    echo '"' . $seg['Distribuidor']['id'] . '",';
    echo '"' . $seg['Distribuidor']['level'] . '",';
    echo '"' . $seg['Distribuidor']['state'] . '",';
    echo '"' . $seg['Distribuidor']['city'] . '",';
    echo '"' . $seg['Distribuidor']['contact1'] . '",';
    echo '"' . $seg['Distribuidor']['contact2'] . '",';
    echo '"' . $seg['Distribuidor']['contact3'] . '",';
    echo '"' . $seg['created_at'] . '",';
    echo '"' . print_bool($seg['localizo_dist']) . '",';
    echo '"' . $seg['fecha_localizo_dist'] . '",';
    echo '"' . $seg['AgenteLocalizoDist']['username'] . '",';
    echo '"' . print_bool($seg['localizo_lead']) . '",';
    echo '"' . $seg['fecha_localizo_lead'] . '",';
    echo '"' . $seg['AgenteLocalizoLead']['username'] . '",';
    echo '"' . str_replace(array("\r\n", '"'), array("\n", "'"), $seg['notas']) . '",';
    echo '"' . $seg['intento'] . '",';
  }

  echo "\r\n";
}

?>
