<?php

echo '"TAB",' .
  '"Asignaciones 1a vuelta",' .
  '"Asignaciones 2a vuelta",' .
  '"Asignaciones (total)",' .
  '"Asignaciones exitosas 1a vuelta",' .
  '"Asignaciones exitosas 2a vuelta",' .
  '"Asignaciones exitosas (total)",' .
  '"Seguimientos 1a vuelta",' .
  '"Seguimientos 2a vuelta",' .
  '"Seguimientos (total)",' .
  '"IDs de distribuidor asignados"' .
  "\n";

foreach($tabs as $id => $tab)
{
  echo '"' . $tab . '",';
  if(isset($lead_per_tab[$id])) echo $lead_per_tab[$id];
  echo ',';
  if(isset($lead_per_tab_2[$id])) echo $lead_per_tab_2[$id];
  echo ',';
  echo (isset($lead_per_tab[$id])? $lead_per_tab[$id] : 0) + (isset($lead_per_tab_2[$id])? $lead_per_tab_2[$id] : 0);
  echo ',';
  if(isset($asign_per_tab[$id])) echo $asign_per_tab[$id];
  echo ',';
  if(isset($asign_per_tab_2[$id])) echo $asign_per_tab_2[$id];
  echo ',';
  echo (isset($asign_per_tab[$id])? $asign_per_tab[$id] : 0) + (isset($asign_per_tab_2[$id])? $asign_per_tab_2[$id] : 0);
  echo ',';
  if(isset($seg_per_tab[$id])) echo $seg_per_tab[$id];
  echo ',';
  if(isset($seg_per_tab_2[$id])) echo $seg_per_tab_2[$id];
  echo ',';
  echo (isset($seg_per_tab[$id])? $seg_per_tab[$id] : 0) + (isset($seg_per_tab_2[$id])? $seg_per_tab_2[$id] : 0);
  echo ',';
  if (isset($leads_to_dist[$id])) echo $leads_to_dist[$id];
  echo "\n";
}

?>
