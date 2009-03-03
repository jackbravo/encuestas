<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Encuesta extends BaseEncuesta
{
  public function preInsert($event)
  {
    $modified = $this->getModified();
    if (!array_key_exists('agente_id', $modified))
    {
      $this->agente_id = myUser::getCurrentId();
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
      $this->getTable()->unlockAll($user_id);
      $this->viewer_id = $user_id;
      $this->save();
    } else if ($this->viewer_id != $user_id) {
      $this->getTable()->unlockAll($user_id);
    }
  }

  /**
   * pre: este lead necesita ser obtenido con el query EncuestaTable::getForSeguimiento
   *   para tener la variable 'seguimiento_count' y funcionar bien
   */
  public function agregarDistribuidor()
  {
    $dist = Doctrine::getTable('Distribuidor')->findNextDist($this);
    if (! $dist) {
      throw new Exception('No se encontro distribuidor para el lead ' . $lead->id);
    }

    $conn = $this->getTable()->getConnection();

    $seguimiento = new Seguimiento();
    $seguimiento->Distribuidor = $dist;
    $seguimiento->Lead = $this;
    $seguimiento->agente_id = myUser::getCurrentId();
    $seguimiento->intento = $this->seguimiento_count + 1;

    $this->last_dist_id = null;
    $dist->tally++;

    $conn->beginTransaction();
    try
    {
      Doctrine::getTable('Seguimiento')->closeForLead($this->id);
      $seguimiento->save();
      $this->save();
      $dist->save();

      $conn->commit();
    }
    catch (Exception $e)
    {
      $conn->rollBack();
      throw $e;
    }

    return $seguimiento;
  }
}
