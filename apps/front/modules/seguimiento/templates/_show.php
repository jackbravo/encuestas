<div class="seguimiento">
  <p class="seguimiento-timestamp">
    <strong><?php echo $seguimiento['Agente']['username'] ?></strong> asignó a
    <strong><?php echo $seguimiento['Distribuidor']['name'] ?></strong>
    <small><?php echo $seguimiento['created_at'] . ' vuelta ' . $seguimiento->intento ?></small>
  </p>
  <blockquote>
    <?php if ($seguimiento->distribuidor_id): ?>
    <ol>
      <li>
        ¿Se contactó al miembro TAB?
        <?php if ($seguimiento->localizo_dist !== null)
                echo $seguimiento->localizo_dist ? '<strong>Sí</strong> <small>' . $seguimiento->fecha_localizo_dist . '</small>': '<strong>No</strong>' ?>
      </li>
      <?php if ($seguimiento->localizo_dist): ?>
      <li>
        <?php if ($seguimiento->pasoTiempoVuelta() || $seguimiento->localizo_lead !== null): ?>
          ¿Se contactó al lead?
          <?php if ($seguimiento->localizo_lead !== null)
                  echo $seguimiento->localizo_lead ? '<strong>Sí</strong> <small>' . $seguimiento->fecha_localizo_lead . '</small>': '<strong>No</strong>' ?>
        <?php else: ?>
          Espere a que pase el tiempo de seguimiento para esta vuelta.
        <?php endif; ?>
      </li>
      <?php endif; ?>
    </ol>
    <?php endif; ?>
  </blockquote>
  <?php echo simple_format_text($seguimiento['notas']) ?>
</div>
