<h1>TV Presence - Sistema de encuestas</h1>

<?php ob_start('Markdown') ?>

### Manuales en formato PDF

- [Scripts de llamada](<?php echo _compute_public_path('script.pdf', 'files', 'pdf') ?>)
- [Manual de llamada](<?php echo _compute_public_path('manual.pdf', 'files', 'pdf') ?>)
- [Manual de usuario](<?php echo _compute_public_path('manual_usuario.pdf', 'files', 'pdf') ?>)
<?php if ($sf_user->hasCredential('admin')): ?>
- [Manual de administrador](<?php echo _compute_public_path('manual_admin.pdf', 'files', 'pdf') ?>)
<?php endif ?>

<!---
### Manuales en formato HTML (para ver en el navegador)

- [Manual de usuario](<?php echo url_for('help/user') ?>)
<?php if ($sf_user->hasCredential('admin')): ?>
- [Manual de administrador](<?php echo url_for('help/admin') ?>)
<?php endif ?>

--->

<?php ob_end_flush() ?>
