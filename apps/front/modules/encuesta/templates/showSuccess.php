<?php use_helper('Text') ?>
<div id="content" class="grid_8">

  <div class="subheader">
    <?php if ($sf_user->hasCredential('admin')): ?>
      <?php echo link_to('Editar', 'encuesta_edit', $encuesta) ?>
    <?php endif; ?>
  </div>

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

  <div class="historial">
  <?php foreach ($encuesta->Seguimiento as $seguimiento): ?>
    <div class="seguimiento">
      <p class="seguimiento-timestamp">
        <strong><?php echo $seguimiento->Agente ?></strong> asignó a
        <strong><?php echo $seguimiento->Distribuidor ?></strong>
        <small><?php echo $seguimiento->created_at ?></small>
      </p>
      <?php echo simple_format_text($seguimiento->notas) ?>
    </div>
  <?php endforeach ?>
  </div>

  <div class="actions">
  <?php if ($encuesta->viewer_id != $sf_user->getId()): ?>
    Este encuestado está siendo editado por <?php $encuesta->Viewer->username ?>
  <?php else: ?>
    HOla
  <?php endif; ?>
  </div>

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
