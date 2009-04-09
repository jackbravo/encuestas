<?php

/**
 * Distribuidor form.
 *
 * @package    form
 * @subpackage Distribuidor
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class DistribuidorForm extends BaseDistribuidorForm
{
  public function configure()
  {
    unset($this['leads_list']);
  }
}
