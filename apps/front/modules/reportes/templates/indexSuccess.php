<h1>Reportes de Agentes</h1>

<?php include_partial('nav') ?>

<br/>

<form method="get">
<?php echo $filter ?>
<input type="submit" value="Filtrar" />
<input type="submit" value="Exportar" name="_export" />
&nbsp;<?php echo link_to('Quitar filtros', 'reportes/index') ?>
</form>

<br/>

<table class="list table">
  <tbody>
    <?php
      $i = -1;
      foreach($agents as $id => $agent):
        $i++;
        if (fmod($i, 15) == 0): ?>
            <tr>
              <th></th>
              <th></th>
              <th colspan="3">Asignaciones de TAB</th>
              <th colspan="3">Asignaciones exitosas de TAB</th>
              <th colspan="3">Seguimientos<br><small>Monitoreo de seguimientos a leads</small></th>
              <th></th>
            </tr>
            <tr>
              <th>Agente</th>
              <th>Leads registrados</th>
              <th>1a vuelta</th>
              <th>2a vuelta</th>
              <th>Total</th>
              <th>1a vuelta</th>
              <th>2a vuelta</th>
              <th>Total</th>
              <th>1a vuelta</th>
              <th>2a vuelta</th>
              <th>Total</th>
              <th>IDs de distribuidor asignados</th>
            </tr>
      <?php endif ?>
      <tr>
        <td><?php echo $agent ?></td>
        <td><?php if (isset($leads_per_agent[$agent])) echo $leads_per_agent[$agent] ?></td>
        <td><?php if (isset($tab_tries_per_agent[$agent])) echo $tab_tries_per_agent[$agent] ?></td>
        <td><?php if (isset($tab_tries_per_agent_2[$agent])) echo $tab_tries_per_agent_2[$agent] ?></td>
        <td><?php echo (isset($tab_tries_per_agent[$agent])? $tab_tries_per_agent[$agent] : 0) + (isset($tab_tries_per_agent_2[$agent])? $tab_tries_per_agent_2[$agent] : 0) ?></td>
        <td><?php if (isset($tab_per_agent[$agent])) echo $tab_per_agent[$agent] ?></td>
        <td><?php if (isset($tab_per_agent_2[$agent])) echo $tab_per_agent_2[$agent] ?></td>
        <td><?php echo (isset($tab_per_agent[$agent])? $tab_per_agent[$agent] : 0) + (isset($tab_per_agent_2[$agent])? $tab_per_agent_2[$agent] : 0) ?></td>
        <td><?php if (isset($lead_per_agent[$agent])) echo $lead_per_agent[$agent] ?></td>
        <td><?php if (isset($lead_per_agent_2[$agent])) echo $lead_per_agent_2[$agent] ?></td>
        <td><?php echo (isset($lead_per_agent[$agent])? $lead_per_agent[$agent] : 0) + (isset($lead_per_agent_2[$agent])? $lead_per_agent_2[$agent] : 0) ?></td>
        <td><?php if (isset($leads_to_dist[$agent])) echo $leads_to_dist[$agent] ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
