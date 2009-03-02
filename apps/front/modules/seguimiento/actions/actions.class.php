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
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeCreate(sfWebRequest $request)
  {
    $lead = $this->getRoute()->getObject();
    $this->forward404unless($lead->viewer_id == $this->getUser()->getId());

    $dist = Doctrine::getTable('Distribuidor')->findNextDist($lead);
    if (! $dist) {
      throw new Exception('No se encontro distribuidor para el lead ' . $lead->id);
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
    $seguimiento->localizo_dist = true;
    $seguimiento->fecha_localizo_dist = new Doctrine_Expression('NOW()');
    $seguimiento->save();

    $this->redirect('@encuesta_show?id=' . $seguimiento->lead_id);
  }

  public function executeLocalizoLead(sfWebRequest $request)
  {
    $seguimiento = $this->getRoute()->getObject();
    $seguimiento->localizo_lead = true;
    $seguimiento->fecha_localizo_lead = new Doctrine_Expression('NOW()');
    $seguimiento->save();

    $this->redirect('@encuesta_show?id=' . $seguimiento->lead_id);
  }
}