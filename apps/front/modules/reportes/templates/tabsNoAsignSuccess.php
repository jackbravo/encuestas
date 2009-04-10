<h1>Tabs sin Asignación</h1>

<?php include_partial('nav') ?>

<br/>

<p>
Distribuidores a los que no se les ha asignado ningún lead.
</p>

<form method="get">
<input type="submit" value="Exportar" name="_export" />
</form>

<br/>

<table class="list table">
  <tbody>
    <?php foreach($tabs as $id => $tab): ?>
      <?php if (fmod($id, 15) == 0): ?>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Ciudad</th>
          <th>Estado</th>
        </tr>
      <?php endif ?>
      <tr>
        <td><?php echo link_to("#{$tab['id']}", '@distribuidor_show?id=' . $tab['id']) ?></td>
        <td><?php echo $tab['name'] ?></td>
        <td><?php echo $tab['city'] ?></td>
        <td><?php echo $tab['state'] ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
