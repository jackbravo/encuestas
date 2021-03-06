<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class DistribuidorTable extends Doctrine_Table
{
  public function findNextDist($lead)
  {
    $prev_dist = $lead->getIdsDistribuidores();

    $q = $this->createQuery('d')
      ->addWhere('d.city = ?', $lead->Ciudad->nombre)
      ->addWhere('d.state = ?', $lead->Estado->nombre)
      ->andWhereNotIn('d.id', $prev_dist)
      ->limit(1);

    $dist = $this->orderDistQuery($q)->fetchOne();

    if ($dist) return $dist;

    $q = $this->createQuery('d')
      ->addWhere('d.state = ?', $lead->Estado->nombre)
      ->andWhereNotIn('d.id', $prev_dist)
      ->limit(1);

    return $dist = $this->orderDistQuery($q)->fetchOne();
  }

  public function orderDistQuery(Doctrine_Query $q)
  {
    $alias = $q->getRootAlias();

    return $q
      ->addOrderBy("$alias.tally asc")
      ->addOrderBy("$alias.performance asc")
    ;
  }

  public function getForShow($params)
  {
    return $this->createQuery('d')
      ->select('d.*, e.nombre, e.apellido_p, e.apellido_m, e.id')
      ->leftJoin('d.Encuestas e')
      ->addWhere('d.id = ?', $params['id'])
      ->fetchOne();
  }

  public function getTabNames()
  {
    $dbh = $this->getConnection();
    $stmt = $dbh->prepare("SELECT id, name FROM distribuidor");
    $stmt->execute();

    return axaiToolkit::toKeyValueArray('id', 'name', $stmt->fetchAll());
  }

  public function getTabsNoAsign()
  {
    $sql = "SELECT d.id, d.name, d.city, d.state, SUM(s.localizo_dist) AS localizo
      FROM distribuidor d
        LEFT JOIN seguimiento s ON s.distribuidor_id = d.id
      GROUP BY d.id HAVING localizo IS NULL OR localizo = 0
      ORDER BY d.state, d.city, d.name";
    $dbh = $this->getConnection();
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll();
  }
}
