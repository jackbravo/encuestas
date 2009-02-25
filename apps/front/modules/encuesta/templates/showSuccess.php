<div class="grid_8">
  <h2><?php echo $encuesta->id . ': ' . $encuesta->nombre . ' ' . $encuesta->apellido_p . ' ' . $encuesta->apellido_m ?></h2>
  Encuestado por <strong><?php echo $encuesta->Encuestador ?></strong>
  @ <?php echo $encuesta->created_at ?>

  <hr />

  <strong>Áreas de interes</strong>
  <ul>
  <?php foreach ($encuesta->AreasInteres as $area): ?>
    <li><?php echo $area ?></li>
  <?php endforeach; ?>
  </ul>

  <strong>Productos de interes</strong>
  <ul>
  <?php foreach ($encuesta->ProductosInteres as $producto): ?>
    <li><?php echo $producto ?></li>
  <?php endforeach; ?>
  </ul>

  <hr />

</div> <!-- /grid_8 -->

<div class="grid_4">
  <div class="box">
    <h4>Datos de contacto</h4>
    <?php if ($encuesta->telefono) echo '<strong>Telefono: </strong>' . $encuesta->telefono . '<br/>' ?>
    <?php if ($encuesta->celular) echo '<strong>Celular: </strong>' . $encuesta->celular . '<br/>' ?>
    <?php if ($encuesta->email) echo '<strong>Email: </strong>' . $encuesta->email . '<br/>' ?>
    <strong>Horario de contacto:</strong>
    <ul>
    <?php foreach ($encuesta->Horarios as $horario): ?>
      <li><?php echo $horario ?></li>
    <?php endforeach; ?>
    </ul>
  </div>

  <div class="box">
    <h4>Información personal</h4>
    <?php if ($encuesta->rfc) echo '<strong>RFC: </strong>' . $encuesta->rfc . '<br/>' ?>
    <?php if ($encuesta->edad) echo '<strong>Edad: </strong>' . $encuesta->edad . '<br/>' ?>
    <?php if ($encuesta->genero) echo '<strong>Genero: </strong>' . $encuesta->printGenero() . '<br/>' ?>

    <strong>Dirección:</strong><br/>
    <?php echo $encuesta->calle . ' ' . $encuesta->numero . ' Col. ' . $encuesta->colonia ?><br/>
    <?php echo $encuesta->municipio ?>,
    <?php echo $encuesta->Estado ?>
    (en la ciudad de <?php echo $encuesta->ciudad ?>)<br/>
    CP: <?php echo $encuesta->cp ?>
  </div>
</div> <!-- /grid_4 -->

<div class="grid_12">
  <a href="<?php echo url_for('encuesta_edit', $encuesta) ?>">Editar</a>
  &nbsp;
  <a href="<?php echo url_for('encuesta') ?>">Lista</a>
</div> <!-- /grid_12 -->
