<h1>Reportes</h1>

<form method="get">
<?php echo $filter ?>
<input type="submit" value="Filtrar" />
</form>

<table class="list">
  <thead>
    <tr>
      <th>Agente</th>
      <th>Leads por agente</th>
      <th>Asignaciones de TAB por agente</th>
      <th>Asignaciones exitosas de TAB por agente</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($agents as $id => $agent): ?>
      <tr>
        <td><?php echo $agent ?></td>
        <td title="Leads por agente"><?php if (isset($leads_per_agent[$agent])) echo $leads_per_agent[$agent] ?></td>
        <td title="Asignaciones de TAB por agente"><?php if (isset($tab_tries_per_agent[$agent])) echo $tab_tries_per_agent[$agent] ?></td>
        <td title="Asignaciones exitosas de TAB por agente"><?php if (isset($tab_tries_per_agent[$agent])) echo $tab_tries_per_agent[$agent] ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
