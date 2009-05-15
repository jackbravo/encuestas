<?php
  $routing = sfContext::getInstance()->getRouting();
  $route_name = $routing->getCurrentRouteName();
  $url = url_for($route_name, $_GET);
  $url = preg_replace('/(&)?page=(\d*)(&)?/', '', $url);
  $url.= (false === strpos($url, '?')) ? '?' : '&';
?>
<?php if ($pager->haveToPaginate()): ?>
  <div class="pagination">
    <a href="<?php echo $url ?>page=1">
      <img src="<?php echo image_path('first.png') ?>" alt="First page" />
    </a>
 
    <a href="<?php echo $url ?>page=<?php echo $pager->getPreviousPage() ?>">
      <img src="<?php echo image_path('previous.png') ?>" alt="Previous page" title="Previous page" />
    </a>
 
    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
      <?php else: ?>
        <a href="<?php echo $url ?>page=<?php echo $page ?>"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>
 
    <a href="<?php echo $url ?>page=<?php echo $pager->getNextPage() ?>">
      <img src="<?php echo image_path('next.png') ?>" alt="Next page" title="Next page" />
    </a>
 
    <a href="<?php echo $url ?>page=<?php echo $pager->getLastPage() ?>">
      <img src="<?php echo image_path('last.png') ?>" alt="Last page" title="Last page" />
    </a>
  </div>
<?php endif; ?>
 
<div class="pagination_desc">
  <strong><?php echo $pager->getNbResults() ?></strong> results
 
  <?php if ($pager->haveToPaginate()): ?>
    - page <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
  <?php endif; ?>
</div>

