<?php use_helper('Text') ?>
<div id="content" class="grid_8">

  <div class="subheader">
    <?php if ($sf_user->hasCredential('admin')): ?>
      <?php echo link_to('Editar', 'encuesta_edit', $encuesta) ?>
    <?php endif; ?>
  </div>

  <h2><?php echo $encuesta->id . ': ' . $encuesta->nombre . ' ' . $encuesta->apellido_p . ' ' . $encuesta->apellido_m ?></h2>
  Encuestado por <strong><?php echo $encuesta->Agente ?></strong>
  <small><?php echo $encuesta->created_at ?></small>

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
  <?php foreach ($seguimientos as $seguimiento): ?>
    <?php include_partial('seguimiento/show', array('seguimiento' => $seguimiento)) ?>
  <?php endforeach ?>
  </div>

  <div class="actions">
  <?php if ($encuesta->viewer_id != $sf_user->getId()) { ?>
    Este encuestado está siendo editado por <strong><?php echo $encuesta->Viewer->username ?></strong>
  <?php } else { ?>

    <?php
      if (sizeof($seguimientos) > 0) {
        $last_seguimiento = $seguimientos[sizeof($seguimientos) - 1];
        if (!$last_seguimiento->localizo_dist) {
          echo link_to('Se contactó al distribuidor', 'seguimiento_localizoDist', array('id' => $last_seguimiento->id));
        } else if (!$last_seguimiento->localizo_lead) {
          echo link_to('Se conctactó al lead', 'seguimiento_localizoLead', array('id' => $last_seguimiento->id));
        }
      }

      echo link_to('Solicitar nuevo distribuidor', 'seguimiento_create', array('id' => $encuesta->id));
    ?>

  <?php } ?>
  </div>

</div> <!-- /grid_8 -->

<div class="grid_4">
  <div class="box">
    <h2>Información del Lead</h2>
    <?php if ($encuesta->telefono) echo '<strong>Telefono: </strong>' . $encuesta->telefono . '<br/>' ?>
    <?php if ($encuesta->celular) echo '<strong>Celular: </strong>' . $encuesta->celular . '<br/>' ?>
    <?php if ($encuesta->email) echo '<strong>Email: </strong>' . $encuesta->email . '<br/>' ?>
    <strong>Horario de contacto:</strong>
    <ul>
    <?php foreach ($encuesta->Horarios as $horario): ?>
      <li><?php echo $horario ?></li>
    <?php endforeach; ?>
    </ul>
    <?php if ($encuesta->rfc) echo '<strong>RFC: </strong>' . $encuesta->rfc . '<br/>' ?>
    <?php if ($encuesta->edad) echo '<strong>Edad: </strong>' . $encuesta->edad . ' años<br/>' ?>
    <?php if ($encuesta->genero) echo '<strong>Genero: </strong>' . $encuesta->printGenero() . '<br/>' ?>

    <strong>Dirección:</strong><br/>
    <?php echo $encuesta->calle . ' ' . $encuesta->numero . ' Col. ' . $encuesta->colonia ?><br/>
    <?php echo $encuesta->municipio ?>,
    <?php echo $encuesta->Estado ?>
    (en la ciudad de <?php echo $encuesta->ciudad ?>)<br/>
    CP: <?php echo $encuesta->cp ?>
  </div>

  <?php if (sizeof($seguimientos) > 0) {
          $dist = $seguimientos[sizeof($seguimientos) - 1]['Distribuidor']; ?>
    <div class="box">
      <h2>Distribuidor #<?php echo $dist->id ?></h2>
      <strong><?php echo $dist->name ?></strong>, <?php echo $dist->level ?><br/>
      <?php echo $dist->city . ', ' . $dist->state ?><br/><br/>
      <?php if ($dist->contact1) echo '<strong>Contacto 1: </strong>' . $dist->contact1 . '<br/>' ?>
      <?php if ($dist->contact2) echo '<strong>Contacto 2: </strong>' . $dist->contact2 . '<br/>' ?>
      <?php if ($dist->contact3) echo '<strong>Contacto 3: </strong>' . $dist->contact3 . '<br/>' ?>
    </div>
  <?php } ?>
</div> <!-- /grid_4 -->
