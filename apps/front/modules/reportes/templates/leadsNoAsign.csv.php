<?php
echo '"Registro",' .
  '"Nombre",' .
  '"Apellido P.",' .
  '"Apellido M.",' .
  '"Ciudad",' .
  '"Estado"' .
  "\n";
foreach ($leads as $id => $lead)
{
  echo '"' . "#{$lead['id']}" . '",';
  echo '"' . $lead['nombre'] . '",';
  echo '"' . $lead['apellido_p'] . '",';
  echo '"' . $lead['apellido_m'] . '",';
  echo '"' . $lead['ciudad'] . '",';
  echo '"' . $lead['edo'] . "\"\n";
}
?>
