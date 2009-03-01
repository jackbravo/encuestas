<?php

/**
 * Distribuidor filter form.
 *
 * @package    filters
 * @subpackage Distribuidor *
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class DistribuidorFormFilter extends BaseDistribuidorFormFilter
{
  public function configure()
  {
    $this->widgetSchema['city']->setOption('with_empty', false);
    $this->widgetSchema['city']->setOption('template', '%input%');
    $this->widgetSchema['state']->setOption('with_empty', false);
    $this->widgetSchema['state']->setOption('template', '%input%');

    $this->widgetSchema->setLabels(array(
      'city' => 'Ciudad',
      'state' => 'Estado',
    ));
  }
}
