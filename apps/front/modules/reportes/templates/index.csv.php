<?php
echo '"Agente";' .
  '"Leads por agente";' .
  '"Asignaciones de TAB por agente (48 hrs.)";' .
  '"24 hrs.";' .
  '"Asignaciones exitosas de TAB por agente (48 hrs.)";' .
  '"24 hrs.";' .
  '"Seguimientos a lead por agente (48 hrs.)";' .
  '"24 hrs.";' .
  '"IDs de distribuidor asignados"' .
  "\n";
foreach($agents as $id => $agent)
{
  echo '"' . $agent . '";';
  if (isset($leads_per_agent[$agent])) echo $leads_per_agent[$agent];
  echo ';';
  if (isset($tab_tries_per_agent[$agent])) echo $tab_tries_per_agent[$agent];
  echo ';';
  if (isset($tab_tries_per_agent_2[$agent])) echo $tab_tries_per_agent_2[$agent];
  echo ';';
  if (isset($tab_per_agent[$agent])) echo $tab_per_agent[$agent];
  echo ';';
  if (isset($tab_per_agent_2[$agent])) echo $tab_per_agent_2[$agent];
  echo ';';
  if (isset($lead_per_agent[$agent])) echo $lead_per_agent[$agent];
  echo ';';
  if (isset($lead_per_agent_2[$agent])) echo $lead_per_agent_2[$agent];
  echo ';';
  if (isset($leads_to_dist[$agent])) echo $leads_to_dist[$agent];
  echo "\n";
}
?>
