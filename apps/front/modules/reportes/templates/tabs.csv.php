<?php

echo '"TAB",' .
  '"Leads por TAB (48 hrs.)",' .
  '"24 hrs.",' .
  '"Seguimientos por TAB (48 hrs.)",' .
  '"24 hrs.",' .
  '"IDs de distribuidor asignados"' .
  "\n";

foreach($tabs as $id => $tab)
{
  echo '"' . $tab . '",';
  if(isset($lead_per_tab[$id])) echo $lead_per_tab[$id];
  echo ',';
  if(isset($lead_per_tab_2[$id])) echo $lead_per_tab_2[$id];
  echo ',';
  if(isset($seg_per_tab[$id])) echo $seg_per_tab[$id];
  echo ',';
  if(isset($seg_per_tab_2[$id])) echo $seg_per_tab_2[$id];
  echo ',';
  if (isset($leads_to_dist[$id])) echo $leads_to_dist[$id];
  echo "\n";
}

?>
