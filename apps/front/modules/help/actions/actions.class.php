<?php

/**
 * help actions.
 *
 * @package    encuesta-herbalife
 * @subpackage help
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class helpActions extends sfActions
{
  public function preExecute()
  {
    Doctrine::getTable('Encuesta')->unlockAll($this->getUser()->getId());
    include(sfConfig::get('sf_lib_dir')
      . DIRECTORY_SEPARATOR . 'vendor'
      . DIRECTORY_SEPARATOR . 'Markdown'
      . DIRECTORY_SEPARATOR . 'markdown.php');
  }

  public function executeIndex(sfWebRequest $request)
  {
  }

  public function executeAdmin(sfWebRequest $request)
  {
  }
}
