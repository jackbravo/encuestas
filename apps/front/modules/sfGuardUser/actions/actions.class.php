<?php

class sfGuardUserActions extends autosfGuardUserActions
{
  public function executeIndex(sfWebRequest $request)
  {
    Doctrine::getTable('Encuesta')->unlockAll($this->getUser()->getId());
    parent::executeIndex($request);
  }
}
