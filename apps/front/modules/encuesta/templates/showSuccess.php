<?php use_helper('Text') ?>
<div id="content" class="grid_8">

  <div class="subheader">
    <?php
    $last_segui = (sizeof($seguimientos) > 0) ? $seguimientos[sizeof($seguimientos) - 1] : false;
    if (!($encuesta->my_dist_id) || $sf_user->hasCredential('admin')) {
      if ($last_segui && ($last_segui->localizo_lead || ($last_segui->intento == 2 && $last_segui->localizo_lead !== null))) {
        echo link_to('Asignar ID', '@encuesta_editId?id=' . $encuesta->id);
      }
    }
    ?>
    <?php if ($sf_user->hasCredential('admin')): ?>
      | <?php echo link_to('Editar', 'encuesta_edit', $encuesta) ?>
    <?php endif; ?>
  </div>

  <h2>
    <?php echo $encuesta->id . ': ' . $encuesta ?>
    <?php if ($encuesta->my_dist_id) echo '<small>(ID '.$encuesta->my_dist_id.')</small>' ?>
  </h2>
  <p class="help">Encuestado por <strong><?php echo $encuesta->Agente ?></strong>
  <small><?php echo $encuesta->created_at ?></small></p>

  <?php if (! Encuesta::dentroDeHorario($encuesta->rangos_horario)): ?>
    <div class="box notice">Estas fuera del horario de contacto de este lead</div>
  <?php endif ?>

  <strong>Horario de contacto:</strong>
  <ul>
  <?php foreach ($encuesta->Horarios as $horario): ?>
    <li><?php echo $horario ?></li>
  <?php endforeach; ?>
  </ul>

  <hr />

  <p>Encuestado por <strong><?php echo $encuesta->printOrigenDatos() ?></strong></p>
  
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

  <strong>Medio de Contacto</strong>
  <ul>
    <li><?php echo $encuesta->MedioContacto ?></li>
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
      if ($last_segui)
      {
        $yes = image_tag('/sf/sf_admin/images/save.png');
        $no = image_tag('/sf/sf_admin/images/cancel.png');
        if ($last_segui->localizo_dist === null && $last_segui->distribuidor_id) {
          echo link_to("$yes Sí", 'seguimiento_localizoDist', array('id' => $last_segui->id));
          echo link_to("$no No", 'seguimiento_localizoDist', array('id' => $last_segui->id, '_no' => ''));
        }

        if ($last_segui->localizo_dist && $last_segui->localizo_lead === null && $last_segui->status == 1
          && $last_segui->pasoTiempoVuelta())
        {
          echo link_to("$yes Sí", 'seguimiento_localizoLead', array('id' => $last_segui->id));
          echo link_to("$no No", 'seguimiento_localizoLead', array('id' => $last_segui->id, '_no' => ''));
        }
      }

      if ( $last_segui == false ||
           ( $last_segui->localizo_dist === false ) ||
           ( $last_segui->localizo_lead === false && $last_segui->intento < 2 ) ||
           ( !($last_segui->distribuidor_id) )
        ) {
        $new = image_tag('/sf/sf_admin/images/default_icon.png');
        echo link_to("$new Asignar Miembro TAB", 'seguimiento_createForLead', array('id' => $encuesta->id));
      }

      if ($last_segui && $last_segui->distribuidor_id)
      {
        $editar = image_tag('/sf/sf_admin/images/edit.png');
        echo link_to("$editar Editar", 'seguimiento_edit', array('id' => $last_segui->id));
      }

    ?>

  <?php } ?>
  </div>

</div> <!-- /grid_8 -->

<div class="grid_4">
  <div class="box">
    <h2>Información del Lead</h2>
    <?php
      if ($encuesta->telefono1) {
        echo '<strong>Teléfono 1: </strong>' . $encuesta->telefono1 . " ";
        if ($encuesta->ext1) echo " ext. " . $encuesta->ext1 . " ";
        echo $encuesta->printTipo(1) . '<br/>';
      }
    ?>
    <?php
      if ($encuesta->telefono2) {
        echo '<strong>Teléfono 2: </strong>' . $encuesta->telefono2 . " ";
        if ($encuesta->ext2) echo " ext. " . $encuesta->ext2 . " ";
        echo $encuesta->printTipo(2) . '<br/>';
      }
    ?>
    <?php
      if ($encuesta->telefono3) {
        echo '<strong>Teléfono 3: </strong>' . $encuesta->telefono3 . " ";
        if ($encuesta->ext3) echo " ext. " . $encuesta->ext3 . " ";
        echo $encuesta->printTipo(3) . '<br/>';
      }
    ?>
    <?php if ($encuesta->email) echo '<strong>Email: </strong>' . $encuesta->email . '<br/>' ?>
    <?php if ($encuesta->nacimiento) echo '<strong>Fecha de Nacimiento: </strong>' . $encuesta->nacimiento . '<br/>' ?>
    <?php if ($encuesta->genero) echo '<strong>Genero: </strong>' . $encuesta->printGenero() . '<br/>' ?>

    <strong>Dirección:</strong><br/>
    <?php echo $encuesta->calle . ' ' . $encuesta->numero . ' Col. ' . $encuesta->colonia ?><br/>
    <?php echo $encuesta->Ciudad ?>,
    <?php echo $encuesta->Estado ?> - 
    CP <?php echo $encuesta->cp ?><br/>
    <strong>Notas:</strong><br/>
    <?php echo nl2br($encuesta->notas) ?>
  </div>

  <?php if (sizeof($seguimientos) > 0) {
          $dist = $seguimientos[sizeof($seguimientos) - 1]['Distribuidor'];
          if ($dist) { ?>
    <div class="box">
      <h2>TAB #<?php echo $dist->id ?></h2>
      <strong><?php echo $dist->name ?></strong>, <?php echo $dist->level ?><br/>
      <?php echo $dist->city . ', ' . $dist->state ?><br/><br/>
      <?php if ($dist->contact1) echo '<strong>Contacto 1: </strong>' . $dist->contact1 . '<br/>' ?>
      <?php if ($dist->contact2) echo '<strong>Contacto 2: </strong>' . $dist->contact2 . '<br/>' ?>
      <?php if ($dist->contact3) echo '<strong>Contacto 3: </strong>' . $dist->contact3 . '<br/>' ?>
    </div>
  <?php }} ?>
</div> <!-- /grid_4 -->
