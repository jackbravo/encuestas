<?php

/**
 * seguimiento actions.
 *
 * @package    encuesta-herbalife
 * @subpackage seguimiento
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class seguimientoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    Doctrine::getTable('Encuesta')->unlockAll($this->getUser()->getId());
    $this->seguimientos1 = Doctrine::getTable('Seguimiento')->findVuelta1();
    $this->seguimientos2 = Doctrine::getTable('Seguimiento')->findVuelta2();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $lead = $this->getRoute()->getObject();
    if ($lead->viewer_id != $this->getUser()->getId()) {
      $this->getUser()->setFlash('notice', 'Este lead está siendo editado por otro usuario');
      $this->redirect('@encuesta_show?id=' . $lead->id);
    }

    $dist = Doctrine::getTable('Distribuidor')->findNextDist($lead);
    if (! $dist) {
      $this->getUser()->setFlash('notice', 'No se encontro distribuidor para el lead ' . $lead->id);
      $this->redirect('@encuesta_show?id=' . $lead->id);
    }

    $seguimiento = $lead->agregarDistribuidor($dist);

    if ($request->isXmlHttpRequest())
    {
      sfProjectConfiguration::getActive()->loadHelpers('Text');
      return $this->renderPartial('show', array('seguimiento' => $seguimiento));
    }
    else
    {
      $this->redirect('@encuesta_show?id=' . $lead->id);
    }
  }

  public function executeLocalizoDist(sfWebRequest $request)
  {
    $seguimiento = $this->getRoute()->getObject();
    $seguimiento->status = 1;
    $seguimiento->localizo_dist = true;
    $seguimiento->fecha_localizo_dist = new Doctrine_Expression('NOW()');

    $conn = $seguimiento->getTable()->getConnection();
    $conn->beginTransaction();
    try
    {
      Doctrine::getTable('Encuesta')->setLastDist($seguimiento->lead_id, $seguimiento->dist_id);
      $seguimiento->save();
      $conn->commit();
    }
    catch (Exception $e)
    {
      throw $e;
    }

    $this->redirect('@encuesta_show?id=' . $seguimiento->lead_id);
  }

  public function executeLocalizoLead(sfWebRequest $request)
  {
    $seguimiento = $this->getRoute()->getObject();
    $seguimiento->status = 0;
    $seguimiento->localizo_lead = true;
    $seguimiento->fecha_localizo_lead = new Doctrine_Expression('NOW()');

    $conn = $seguimiento->getTable()->getConnection();
    $conn->beginTransaction();
    try
    {
      Doctrine::getTable('Encuesta')->unsetLastDist($seguimiento->lead_id);
      $seguimiento->save();
      $conn->commit();
    }
    catch (Exception $e)
    {
      throw $e;
    }

    $this->redirect('@encuesta_show?id=' . $seguimiento->lead_id);
  }
}
