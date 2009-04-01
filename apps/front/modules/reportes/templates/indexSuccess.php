<h1>Reportes de Agentes</h1>

<div class="tabs">
  <?php echo link_to('Agentes', 'reportes/index') ?>
  &nbsp;<?php echo link_to('TAB Team', 'reportes/tabs') ?>
</div>

<br/>

<form method="get">
<?php echo $filter ?>
<input type="submit" value="Filtrar" />
<input type="submit" value="Exportar" name="_export" />
</form>

<br/>

<table class="list">
  <thead>
    <tr>
      <th>Agente</th>
      <th>Leads por agente</th>
      <th>Asignaciones de TAB por agente (48 hrs.)</th>
      <th>24 hrs.</th>
      <th>Asignaciones exitosas de TAB por agente (48 hrs.)</th>
      <th>24 hrs.</th>
      <th>Seguimientos a lead por agente (48 hrs.)</th>
      <th>24 hrs.</th>
      <th>IDs de distribuidor asignados</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($agents as $id => $agent): ?>
      <tr>
        <td><?php echo $agent ?></td>
        <td title="Leads por agente"><?php if (isset($leads_per_agent[$agent])) echo $leads_per_agent[$agent] ?></td>
        <td title="Asignaciones de TAB por agente (48 hrs.)"><?php if (isset($tab_tries_per_agent[$agent])) echo $tab_tries_per_agent[$agent] ?></td>
        <td title="Asignaciones de TAB por agente (24 hrs.)"><?php if (isset($tab_tries_per_agent_2[$agent])) echo $tab_tries_per_agent_2[$agent] ?></td>
        <td title="Asignaciones exitosas de TAB por agente (48 hrs.)"><?php if (isset($tab_per_agent[$agent])) echo $tab_per_agent[$agent] ?></td>
        <td title="Asignaciones exitosas de TAB por agente (24 hrs.)"><?php if (isset($tab_per_agent_2[$agent])) echo $tab_per_agent_2[$agent] ?></td>
        <td title="Seguimientos a leads por agente (48 hrs.)"><?php if (isset($lead_per_agent[$agent])) echo $lead_per_agent[$agent] ?></td>
        <td title="Seguimientos a leads por agente (24 hrs.)"><?php if (isset($lead_per_agent_2[$agent])) echo $lead_per_agent_2[$agent] ?></td>
        <td title="IDs de distribuidor ssignados"><?php if (isset($leads_to_dist[$agent])) echo $leads_to_dist[$agent] ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
