<div class="seguimiento">
  <p class="seguimiento-timestamp">
    <strong><?php echo $seguimiento['Agente']['username'] ?></strong> asignó a
    <strong><?php echo $seguimiento['Distribuidor']['name'] ?></strong>
    <small><?php echo $seguimiento['created_at'] ?></small>
  </p>
  <?php echo simple_format_text($seguimiento['notas']) ?>
</div>
