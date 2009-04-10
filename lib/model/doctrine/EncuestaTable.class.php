<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class EncuestaTable extends Doctrine_Table
{
  public function getLeadsQuery(Doctrine_Query $q)
  {
    $alias = $q->getRootAlias();

    return $q
      ->select("$alias.id, $alias.nombre, $alias.apellido_p, $alias.apellido_m")
      ->addSelect("$alias.ciudad, edo.nombre, $alias.created_at")
      ->leftJoin("$alias.Estado edo")
      ->addWhere("$alias.last_dist_id IS NULL")
      ->addWhere("$alias.viewer_id IS NULL")
      ->addOrderBy("$alias.created_at")
    ;
  }

  public function getListQuery(Doctrine_Query $q)
  {
    $alias = $q->getRootAlias();

    return $q
      ->select("$alias.id, $alias.nombre, $alias.apellido_p, $alias.apellido_m")
      ->addSelect("$alias.ciudad, edo.nombre, $alias.created_at")
      ->leftJoin("$alias.Estado edo")
      ->addOrderBy("$alias.nombre")
      ->addOrderBy("$alias.apellido_p")
    ;
  }

  /**
   * Debe regresar seguimiento_count
   */
  public function getForSeguimiento($params)
  {
    $encuesta = $this->createQuery('e')
      ->select('e.nombre, e.ciudad, edo.nombre, e.viewer_id, e.last_dist_id')
      ->addSelect('SUM(s.localizo_dist) AS seguimiento_count')
      ->leftJoin('e.Estado edo')
      ->leftJoin('e.Seguimiento s')
      ->addWhere('e.id = ?', $params['id'])
      ->fetchOne();
    $encuesta->Seguimiento = new Doctrine_Collection('Seguimiento');

    return $encuesta;
  }

  public function getForShow($params)
  {
    return $this->createQuery('e')
      ->leftJoin('e.Agente')
      ->leftJoin('e.Estado')
      ->leftJoin('e.LastDist')
      ->leftJoin('e.Horarios')
      ->leftJoin('e.AreasInteres')
      ->leftJoin('e.ProductosInteres')
      ->leftJoin('e.MedioContacto')
      ->addWhere('e.id = ?', $params['id'])
      ->fetchOne();
  }

  public function unlockAll($agent_id)
  {
    return Doctrine_Query::create()
      ->update('Encuesta e')
      ->set('e.viewer_id', 'NULL')
      ->addWhere('e.viewer_id = ?', $agent_id)
      ->execute();
  }

  public function setLastDist($lead_id, $dist_id)
  {
    // TODO: report bug to doctrine
    $dbh = $this->getConnection();
    $stmt = $dbh->prepare("UPDATE encuesta SET last_dist_id = ? WHERE id = ?");
    $stmt->execute(array($dist_id, $lead_id));
  }

  public function unsetLastDist($lead_id)
  {
    $this->createQuery('l')
      ->update()
      ->set('last_dist_id', 'NULL')
      ->where('l.id = ?', $lead_id)
      ->execute();
  }

  public function getLeadsPerAgents($from, $to)
  {
    $sql = "SELECT COUNT(e.id) count, a.username
      FROM sf_guard_user a LEFT JOIN encuesta e ON e.agente_id = a.id";
    if ($from !== null) {
      $sql .= " WHERE e.created_at BETWEEN ? AND ? + interval 1 day";
    }
    $sql .= " GROUP BY e.agente_id";
    $dbh = $this->getConnection();
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array($from, $to));

    return axaiToolkit::toKeyValueArray('username', 'count', $stmt->fetchAll());
  }

  public function getLeadsToDistPerAgents($from, $to)
  {
    $sql = "SELECT COUNT(e.id) count, a.username
      FROM sf_guard_user a LEFT JOIN encuesta e ON e.agent_my_dist_id = a.id";
    if ($from !== null) {
      $sql .= " WHERE e.fecha_my_dist_id BETWEEN ? AND ? + interval 1 day";
    }
    $sql .= " GROUP BY e.agent_my_dist_id";
    $dbh = $this->getConnection();
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array($from, $to));

    return axaiToolkit::toKeyValueArray('username', 'count', $stmt->fetchAll());
  }

  public function getLeadsToDistPerTabs($from, $to)
  {
    $dbh = $this->getConnection();
    $stmt = $dbh->prepare("SELECT COUNT(*) count, e.last_dist_id id
      FROM encuesta e
      WHERE e.my_dist_id IS NOT NULL
      GROUP BY e.last_dist_id
    ");
    $stmt->execute(array($from, $to));

    return axaiToolkit::toKeyValueArray('id', 'count', $stmt->fetchAll());
  }

  public function getLeadsNoAsign($from, $to)
  {
    $sql = "SELECT e.id, e.nombre, e.apellido_p, e.apellido_m, e.ciudad, edo.nombre AS edo
      FROM encuesta e
        LEFT JOIN seguimiento s ON s.lead_id = e.id
        LEFT JOIN estado edo ON edo.id = e.estado_id
      WHERE s.intento = 2 AND s.localizo_lead = false";
    if ($from !== null) {
      $sql .= " AND e.created_at BETWEEN ? AND ? + interval 1 day";
    }
    $dbh = $this->getConnection();
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array($from, $to));

    return $stmt->fetchAll();
  }
}
