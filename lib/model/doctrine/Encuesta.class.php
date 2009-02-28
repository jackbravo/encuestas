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
      try {
        $this->encuestador_id = sfContext::getInstance()->getUser()
          ->getAttribute('user_id', null, 'sfGuardSecurityUser');
      } catch (Exception $e) {
      }
    }
  }

  public function printGenero()
  {
    switch ($this->genero) {
      case 'm': return 'masculino'; break;
      case 'f': return 'femenino'; break;
      default: return '';
    }
  }

  public function lock($user_id)
  {
    if (! is_numeric($this->viewer_id)) {
      $conn = $this->getTable()->getConnection();

      $conn->beginTransaction();
      try
      {
        Doctrine_Query::create()
          ->update('Encuesta e')
          ->set('e.viewer_id', 'NULL')
          ->addWhere('e.viewer_id = ?', array($user_id))
          ->execute();

        $this->viewer_id = $user_id;
        $this->save();

        $conn->commit();
      }
      catch (Exception $e)
      {
        $conn->rollBack();
        throw $e;
      }
    }
  }
}
