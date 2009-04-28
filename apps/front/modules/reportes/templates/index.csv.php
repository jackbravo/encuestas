<?php
echo '"Agente",' .
  '"Leads registrados",' .
  '"Intentos de Asignaciones de TAB 1a vuelta",' .
  '"Intentos de Asignaciones de TAB 2a vuelta",' .
  '"Intentos de Asignaciones de TAB (total)",' .
  '"Asignaciones exitosas de TAB 1a vuelta",' .
  '"Asignaciones exitosas de TAB 2a vuelta",' .
  '"Asignaciones exitosas de TAB (total)",' .
  '"Monitoreo de eguimientos 1a vuelta",' .
  '"Monitoreo de eguimientos 2a vuelta",' .
  '"Monitoreo de eguimientos (total)",' .
  '"IDs de distribuidor asignados"' .
  "\n";
foreach($agents as $id => $agent)
{
  echo '"' . $agent . '",';
  if (isset($leads_per_agent[$agent])) echo $leads_per_agent[$agent];
  echo ',';
  if (isset($tab_tries_per_agent[$agent])) echo $tab_tries_per_agent[$agent];
  echo ',';
  if (isset($tab_tries_per_agent_2[$agent])) echo $tab_tries_per_agent_2[$agent];
  echo ',';
  echo (isset($tab_tries_per_agent[$agent])? $tab_tries_per_agent[$agent] : 0) + (isset($tab_tries_per_agent_2[$agent])? $tab_tries_per_agent_2[$agent] : 0);
  echo ',';
  if (isset($tab_per_agent[$agent])) echo $tab_per_agent[$agent];
  echo ',';
  if (isset($tab_per_agent_2[$agent])) echo $tab_per_agent_2[$agent];
  echo ',';
  echo (isset($tab_per_agent[$agent])? $tab_per_agent[$agent] : 0) + (isset($tab_per_agent_2[$agent])? $tab_per_agent_2[$agent] : 0);
  echo ',';
  if (isset($lead_per_agent[$agent])) echo $lead_per_agent[$agent];
  echo ',';
  if (isset($lead_per_agent_2[$agent])) echo $lead_per_agent_2[$agent];
  echo ',';
  echo (isset($lead_per_agent[$agent])? $lead_per_agent[$agent] : 0) + (isset($lead_per_agent_2[$agent])? $lead_per_agent_2[$agent] : 0);
  echo ',';
  if (isset($leads_to_dist[$agent])) echo $leads_to_dist[$agent];
  echo "\n";
}
?>
