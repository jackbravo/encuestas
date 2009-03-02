<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class SeguimientoTable extends Doctrine_Table
{
  public function findForLead($lead_id)
  {
    return $this->createQuery('s')
      ->select('s.*, a.username, d.name')
      ->leftJoin('s.Agente a')
      ->leftJoin('s.Distribuidor d')
      ->addWhere('s.lead_id = ?', $lead_id)
      ->orderBy('s.created_at')
      ->execute();
  }
}
