<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<?php include_http_metas() ?>
<?php include_metas() ?>

<title><?php echo $sf_response->getTitle() ?> | Encuesta Herbalife</title>

<link rel="shortcut icon" href="<?php echo image_path('/favicon.ico') ?>" />

</head>
<body>

<div id="ajax-loader">
  Loading...
</div>
<script type="text/javascript">
$('#ajax-loader').ajaxStart(function(){
  $(this).show('normal');
}).ajaxStop(function(){
  $(this).hide('normal');
});
</script>

<div class="container_12">

<div class="fullspan clearfix" id="header">
  <div id="logo" class="grid_12">
    <?php echo link_to(image_tag('logo_header.gif'), '@encuesta_new') ?>
  </div>
</div>

<div class="fullspan" id="menu">
  <?php if ($sf_user->isAuthenticated()): ?>
    <ul>
    <?php
      $links = array(
        'encuesta_new' => array('label' => 'Nueva Encuesta'),
        'leads' => array('label' => 'Leads sin TAB'),
        'seguimiento' => array('label' => 'Seguimiento'),
        'encuesta' => array('label' => 'Encuestas'),
      );

      foreach ($links as $route => $link)
      {
        if (isset($link['perm']) && !$sf_user->hasCredential($link['perm'])) {
          continue;
        }
        $current = sfContext::getInstance()->getRouting()->getCurrentRouteName();
        $class = $current == $route ? 'active' : '';
        echo "<li class='$class'>" . link_to($link['label'], $route) . '</li>';
      }
    ?>
    </ul>

    <ul id="user-tools" class="top-right">
      <?php if ($sf_user->hasCredential('admin')): ?>
        <li><?php echo link_to('Reportes', 'reportes/metricas') ?></li>
        <li><?php echo link_to('Usuarios', '@sf_guard_user') ?></li>
        <li><?php echo link_to('TAB Team', '@distribuidor') ?></li>
      <?php endif ?>
      <li><?php echo link_to('Ayuda', 'help/index') ?></li>
      <li><?php echo link_to('Salir', '@sf_guard_signout') ?></li>
    </ul>
  <?php endif; ?>

  <div></div>

</div>

<div id="main" class="fullspan clearfix">

  <?php if ($sf_user->hasFlash('notice')): ?>
    <div class="box notice">
      <?php echo __($sf_user->getFlash('notice')) ?>
    </div>
  <?php endif; ?>

  <?php if ($sf_user->hasFlash('error')): ?>
    <div class="box error">
      <?php echo __($sf_user->getFlash('error')) ?>
    </div>
  <?php endif; ?>

  <?php echo $sf_content ?>
</div>

<div id="footer" class="fullspan">
  Copyright ©2008 <?php echo link_to('Herbalife', 'http://www.herbalife.com') ?>
</div>

</div> <!-- /container_12 -->
</body>
</html>
