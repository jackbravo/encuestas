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

  public function preSave($event)
  {
    $modified = $this->getModified();
    if (array_key_exists('my_dist_id', $modified))
    {
      $this->agent_my_dist_id = myUser::getCurrentId();
      $this->fecha_my_dist_id = date('Y-m-d H:m:i');
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

  public function printOrigenDatos()
  {
    switch ($this->origen_datos) {
      case '1': return 'teléfono'; break;
      case '2': return 'email'; break;
      default: return '';
    }
  }

  public function printTipo($tel)
  {
    $tipo_tel = 'tel_tipo' . $tel;
    switch ($this->$tipo_tel) {
      case '1': return 'casa'; break;
      case '2': return 'oficina'; break;
      case '3': return 'celular'; break;
      case '4': return 'nextel'; break;
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
  public function agregarDistribuidor($dist)
  {
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

  public function getIdsDistribuidores()
  {
    $distribuidores = Doctrine::getTable('Distribuidor')->createQuery('d')
      ->select('d.id')
      ->leftJoin('d.Seguimiento s')
      ->where('s.lead_id = ?', $this->id)
      ->execute();

    $ids = array();
    foreach ($distribuidores as $dist)
    {
      $ids[] = $dist->id;
    }

    return $ids;
  }

  public static function dentroDeHorario($horarios)
  {
    foreach ($horarios as $horario)
    {
      list ($h_min, $h_max) = explode('..', $horario['rango']);
      if (date('H') >= $h_min && date('H') < $h_max) return true;
    }

    return false;
  }

  public function __toString()
  {
    return $this->nombre . ' ' . $this->apellido_p . ' ' . $this->apellido_m;
  }
}
