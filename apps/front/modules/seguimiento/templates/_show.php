<div class="seguimiento">
  <p class="seguimiento-timestamp">
    <strong><?php echo $seguimiento['Agente']['username'] ?></strong> asignó a
    <strong><?php echo $seguimiento['Distribuidor']['name'] ?></strong>
    <small><?php echo $seguimiento['created_at'] ?></small>
  </p>
  <blockquote>
    <ul>
      <li>
        ¿Se contactó al distribuidor?
        <?php echo $seguimiento->localizo_dist ? 'Sí ' . $seguimiento->fecha_localizo_dist : 'No' ?>
      </li>
      <?php if ($seguimiento->localizo_dist): ?>
      <li>
        ¿Se contactó al lead?
        <?php echo $seguimiento->localizo_lead ? 'Sí ' . $seguimiento->fecha_localizo_lead : 'No' ?>
      </li>
      <?php endif; ?>
    </ul>
  </blockquote>
  <?php echo simple_format_text($seguimiento['notas']) ?>
</div>
