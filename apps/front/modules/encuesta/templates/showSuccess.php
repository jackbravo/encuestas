<div class="grid_8">
  <h2><?php echo $encuesta->id . ': ' . $encuesta->nombre . ' ' . $encuesta->apellido_p . ' ' . $encuesta->apellido_m ?></h2>
  Encuestado por <strong><?php echo $encuesta->Encuestador ?></strong>
  @ <?php echo $encuesta->created_at ?>

  <hr />

  <h3>Información personal</h3>
  <?php if ($encuesta->rfc) echo '<strong>RFC: </strong>' . $encuesta->rfc . '<br/>' ?>
  <?php if ($encuesta->edad) echo '<strong>edad: </strong>' . $encuesta->edad . '<br/>' ?>
  <?php if ($encuesta->genero) echo '<strong>genero: </strong>' . $encuesta->printGenero() . '<br/>' ?>
  <hr />

  <h3>Dirección</h3>
  <?php echo $encuesta->calle . ' ' . $encuesta->numero . ' Col. ' . $encuesta->colonia ?><br/>
  <?php echo $encuesta->municipio ?>,
  <?php echo $encuesta->Estado ?>
  (en la ciudad de <?php echo $encuesta->ciudad ?>)<br/>
  CP: <?php echo $encuesta->cp ?>
  <hr />
</div> <!-- /grid_8 -->

<div class="grid_4">
  <div class="box">
    <h4>Datos de contacto</h4>
    <?php if ($encuesta->telefono) echo '<strong>telefono: </strong>' . $encuesta->telefono . '<br/>' ?>
    <?php if ($encuesta->celular) echo '<strong>celular: </strong>' . $encuesta->celular . '<br/>' ?>
    <?php if ($encuesta->email) echo '<strong>email: </strong>' . $encuesta->email . '<br/>' ?>
  </div>
</div> <!-- /grid_4 -->

<div class="grid_12">
  <a href="<?php echo url_for('encuesta_edit', $encuesta) ?>">Editar</a>
  &nbsp;
  <a href="<?php echo url_for('encuesta') ?>">Lista</a>
</div> <!-- /grid_12 -->
