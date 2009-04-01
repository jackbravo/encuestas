<h1>Reportes del TAB team</h1>

<div class="tabs">
  <?php echo link_to('Agentes', 'reportes/index') ?>
  &nbsp;<?php echo link_to('TAB Team', 'reportes/tabs') ?>
</div>

<br/>

<form method="get">
<?php echo $filter ?>
<input type="submit" value="Filtrar" />
</form>

<br/>

<table class="list">
  <thead>
    <tr>
      <th>TAB</th>
      <th>Leads por TAB (48 hrs.)</th>
      <th>24 hrs.</th>
      <th>Seguimientos por TAB (48 hrs.)</th>
      <th>24 hrs.</th>
      <th>IDs de distribuidor asignados</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($tabs as $id => $tab): ?>
      <tr>
        <td><?php echo link_to($tab, '@distribuidor_show?id=' . $id) ?></td>
        <td title="Leads por TAB (48 hrs.)"><?php if(isset($lead_per_tab[$id])) echo $lead_per_tab[$id] ?></td>
        <td title="Leads por TAB (24 hrs.)"><?php if(isset($lead_per_tab_2[$id])) echo $lead_per_tab_2[$id] ?></td>
        <td title="Seguimientos por TAB (48 hrs.)"><?php if(isset($seg_per_tab[$id])) echo $seg_per_tab[$id] ?></td>
        <td title="Seguimientos por TAB (24 hrs.)"><?php if(isset($seg_per_tab_2[$id])) echo $seg_per_tab_2[$id] ?></td>
        <td title="IDs de distribuidor ssignados"><?php if (isset($leads_to_dist[$id])) echo $leads_to_dist[$id] ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
