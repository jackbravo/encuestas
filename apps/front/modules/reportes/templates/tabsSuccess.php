<h1>Reportes del TAB team</h1>

<?php include_partial('nav') ?>

<br/>

<form method="get">
<?php echo $filter ?>
<input type="submit" value="Filtrar" />
<input type="submit" value="Exportar" name="_export" />
&nbsp;<?php echo link_to('Quitar filtros', 'reportes/tabs') ?>
</form>

<br/>

<table class="list table">
  <thead>
    <tr>
      <th></th>
      <th colspan="3">Asignaciones<br><small>Total histórico</small></th>
      <th colspan="3">Asignaciones Exitosas<br><small>Donde se pudo localizar al tab</small></th>
      <th colspan="3">Seguimientos<br><small>Leads que fueron contactados por el tab</small></th>
      <th>IDs de distribuidor asignados</th>
    </tr>
    <tr>
      <th>TAB</th>
      <th>1a vuelta</th>
      <th>2a vuelta</th>
      <th>Total</th>
      <th>1a vuelta</th>
      <th>2a vuelta</th>
      <th>Total</th>
      <th>1a vuelta</th>
      <th>2a vuelta</th>
      <th>Total</th>
      <th>Total</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($tabs as $id => $tab): ?>
      <?php if (fmod($id, 15) == 0): ?>
      <?php endif ?>
      <tr>
        <td><?php echo link_to($tab, '@distribuidor_show?id=' . $id) ?></td>
        <td><?php if(isset($lead_per_tab[$id])) echo $lead_per_tab[$id] ?></td>
        <td><?php if(isset($lead_per_tab_2[$id])) echo $lead_per_tab_2[$id] ?></td>
        <td><?php echo (isset($lead_per_tab[$id])? $lead_per_tab[$id] : 0) + (isset($lead_per_tab_2[$id])? $lead_per_tab_2[$id] : 0) ?></td>
        <td><?php if(isset($asign_per_tab[$id])) echo $asign_per_tab[$id] ?></td>
        <td><?php if(isset($asign_per_tab_2[$id])) echo $asign_per_tab_2[$id] ?></td>
        <td><?php echo (isset($asign_per_tab[$id])? $asign_per_tab[$id] : 0) + (isset($asign_per_tab_2[$id])? $asign_per_tab_2[$id] : 0) ?></td>
        <td><?php if(isset($seg_per_tab[$id])) echo $seg_per_tab[$id] ?></td>
        <td><?php if(isset($seg_per_tab_2[$id])) echo $seg_per_tab_2[$id] ?></td>
        <td><?php echo (isset($seg_per_tab[$id])? $seg_per_tab[$id] : 0) + (isset($seg_per_tab_2[$id])? $seg_per_tab_2[$id] : 0) ?></td>
        <td><?php if (isset($leads_to_dist[$id])) echo $leads_to_dist[$id] ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
