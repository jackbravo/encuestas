<h1>Reportes</h1>

<form method="get">
<?php echo $filter ?>
<input type="submit" value="Filtrar" />
</form>

<br/>

<table class="list">
  <thead>
    <tr>
      <th>Agente</th>
      <th>Leads por agente</th>
      <th>Asignaciones de TAB por agente (24 hrs.)</th>
      <th>48 hrs.</th>
      <th>Asignaciones exitosas de TAB por agente (24 hrs.)</th>
      <th>48 hrs.</th>
      <th>Seguimientos a lead por agente (24 hrs.)</th>
      <th>48 hrs.</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($agents as $id => $agent): ?>
      <tr>
        <td><?php echo $agent ?></td>
        <td title="Leads por agente"><?php if (isset($leads_per_agent[$agent])) echo $leads_per_agent[$agent] ?></td>
        <td title="Asignaciones de TAB por agente (24 hrs.)"><?php if (isset($tab_tries_per_agent[$agent])) echo $tab_tries_per_agent[$agent] ?></td>
        <td title="Asignaciones de TAB por agente (48 hrs.)"><?php if (isset($tab_tries_per_agent_2[$agent])) echo $tab_tries_per_agent_2[$agent] ?></td>
        <td title="Asignaciones exitosas de TAB por agente (24 hrs.)"><?php if (isset($tab_per_agent[$agent])) echo $tab_per_agent[$agent] ?></td>
        <td title="Asignaciones exitosas de TAB por agente (48 hrs.)"><?php if (isset($tab_per_agent_2[$agent])) echo $tab_per_agent_2[$agent] ?></td>
        <td title="Seguimientos a leads por agente (24 hrs.)"><?php if (isset($lead_per_agent[$agent])) echo $lead_per_agent[$agent] ?></td>
        <td title="Seguimientos a leads por agente (48 hrs.)"><?php if (isset($lead_per_agent_2[$agent])) echo $lead_per_agent_2[$agent] ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
