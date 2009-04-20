<h1>Leads no Asignados</h1>

<?php include_partial('nav') ?>

<br/>

<form method="get">
<?php echo $filter ?>
<input type="submit" value="Filtrar" />
<input type="submit" value="Exportar" name="_export" />
&nbsp;<?php echo link_to('Quitar filtros', 'reportes/leadsNoAsign') ?>
</form>

<p>
Leads que después de la segunda vuelta de seguimiento no fueron contactados por ningún TAB
</p>

<br/>

<table class="list table">
  <tbody>
    <?php foreach($leads as $id => $lead): ?>
      <?php if (fmod($id, 15) == 0): ?>
        <tr>
          <th>Registro</th>
          <th>Nombre</th>
          <th>Apellido P.</th>
          <th>Apellido M.</th>
          <th>Ciudad</th>
          <th>Estado</th>
        </tr>
      <?php endif ?>
      <tr>
        <td><?php echo link_to("#{$lead['id']}", '@encuesta_show?id=' . $lead['id']) ?></td>
        <td><?php echo $lead['nombre'] ?></td>
        <td><?php echo $lead['apellido_p'] ?></td>
        <td><?php echo $lead['apellido_m'] ?></td>
        <td><?php echo $lead['ciudad'] ?></td>
        <td><?php echo $lead['edo'] ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
