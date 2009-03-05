<div class="seguimiento">
  <p class="seguimiento-timestamp">
    <strong><?php echo $seguimiento['Agente']['username'] ?></strong> asignó a
    <strong><?php echo $seguimiento['Distribuidor']['name'] ?></strong>
    <small><?php echo $seguimiento['created_at'] ?></small>
  </p>
  <blockquote>
    <ol>
      <li>
        ¿Se contactó al distribuidor?
        <?php if ($seguimiento->localizo_dist !== null)
                echo $seguimiento->localizo_dist ? '<strong>Sí</strong> <small>' . $seguimiento->fecha_localizo_dist . '</small>': '<strong>No</strong>' ?>
      </li>
      <?php if ($seguimiento->localizo_dist): ?>
      <li>
        ¿Se contactó al lead?
        <?php if ($seguimiento->localizo_lead !== null)
                echo $seguimiento->localizo_lead ? '<strong>Sí</strong> <small>' . $seguimiento->fecha_localizo_lead . '</small>': '<strong>No</strong>' ?>
      </li>
      <?php endif; ?>
    </ol>
  </blockquote>
  <?php echo simple_format_text($seguimiento['notas']) ?>
</div>
