<?php

class myUser extends sfGuardSecurityUser
{
  public function getId()
  {
    return $this->getAttribute('user_id', null, 'sfGuardSecurityUser');
  }

  public static function getCurrentId()
  {
    try
    {
      return sfContext::getInstance()->getUser()
        ->getAttribute('user_id', null, 'sfGuardSecurityUser');
    }
    catch (Exception $e)
    {
      return null;
    }
  }

  public function signOut()
  {
    Doctrine::getTable('Encuesta')->unlockAll($this->getId());
    parent::signOut();
  }
}
