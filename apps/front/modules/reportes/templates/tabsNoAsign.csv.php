<?php
echo '"ID",' .
  '"Nombre",' .
  '"Ciudad",' .
  '"Estado"' .
  "\n";

foreach($tabs as $id => $tab)
{
  echo '"' . "#{$tab['id']}" . '",';
  echo '"' . $tab['name'] . '",';
  echo '"' . $tab['city'] . '",';
  echo '"' . $tab['state'] . "\"\n";
}
?>
