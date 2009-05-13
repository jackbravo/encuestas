<h1>Métricas</h1>

<?php include_partial('nav') ?>

<br/>

<form method="get">
<?php echo $filter ?>
<input type="submit" value="Filtrar" />
<input type="submit" value="Exportar" name="_export" />
&nbsp;<?php echo link_to('Quitar filtros', 'reportes/index') ?>
</form>

<br/>

<table class="small">
  <tr><th>Número de leads recibidos por teléfono</th><td><?php echo $leads_by_phone ?></td></tr>
  <tr><th>Número de leads recibidos por email</th><td><?php echo $leads_by_email ?></td></tr>
  <tr><th>Número de leads recibidos</th><td><?php echo $leads_received ?></td></tr>
  <tr><th>Número de leads con asignación exitosa</th><td><?php echo $leads_assigned ?></td></tr>
  <tr><th>Número de leads con seguimiento exitoso del TAB</th><td><?php echo $leads_followed_up ?></td></tr>
  <tr><th>Número de leads convertidos en distribuidor</th><td><?php echo $leads_converted ?></td></tr>
</table>
