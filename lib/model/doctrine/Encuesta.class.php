<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Encuesta extends BaseEncuesta
{
  public function preInsert($event)
  {
    $modified = $this->getModified();
    if (!array_key_exists('encuestador_id', $modified))
    {
      $this->encuestador_id = sfContext::getInstance()->getUser()
        ->getAttribute('user_id', null, 'sfGuardSecurityUser');
    }
  }
}
