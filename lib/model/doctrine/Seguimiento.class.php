<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Seguimiento extends BaseSeguimiento
{
  public function preSave($event)
  {
    $modified = $this->getModified();

    if (array_key_exists('localizo_dist', $modified))
    {
      if ($this->localizo_dist) {
        Doctrine::getTable('Encuesta')->setLastDist($this->lead_id, $this->distribuidor_id);
        $this->fecha_localizo_dist = new Doctrine_Expression('NOW()');
      } else {
        Doctrine::getTable('Encuesta')->unsetLastDist($this->lead_id);
        $this->fecha_localizo_dist = null;
      }
    }

    if (array_key_exists('localizo_lead', $modified))
    {
      if ($this->localizo_dist) {
        $this->fecha_localizo_lead = new Doctrine_Expression('NOW()');
      } else {
        $this->fecha_localizo_lead = null;
      }
    }

    if (!array_key_exists('status', $modified))
    {
      if ($this->localizo_dist && !$this->localizo_lead) {
        $this->status = 1;
      } else {
        $this->status = 0;
      }
    }
  }
}
