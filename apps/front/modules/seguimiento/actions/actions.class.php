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
      $this->getUser()->setFlash('notice', 'No se encontro distribuidor para el lead.');
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
      $this->getUser()->setFlash('notice', 'Ahora tienes que localizar al miembro TAB para darle los datos del lead. Los datos del TAB aparecen en el bloque inferior de la derecha. Utiliza todos tus recursos disponibles para localizarlo.');
      $this->redirect('@encuesta_show?id=' . $lead->id);
    }
  }

  public function executeLocalizoDist(sfWebRequest $request)
  {
    $seguimiento = $this->getRoute()->getObject();

    if ($request->hasParameter('_no'))
      $seguimiento->localizo_dist = false;
    else
      $seguimiento->localizo_dist = true;

    $seguimiento->agent_localizo_dist = $this->getUser()->getId();
    $seguimiento->save();

    if (!$seguimiento->localizo_dist) {
      $this->getUser()->setFlash('notice', "Si a pesar de todo no pudiste localizar al miembro TAB entonces asigna otro miembro TAB.");
    } else if ($seguimiento->localizo_dist && $seguimiento->intento <= 2) {
      $this->getUser()->setFlash('notice', "No necesitas hacer nada más hasta que pase el periodo de espera para la vuelta $seguimiento->intento.");
    }
    $this->redirect('@encuesta_show?id=' . $seguimiento->lead_id);
  }

  public function executeLocalizoLead(sfWebRequest $request)
  {
    $seguimiento = $this->getRoute()->getObject();

    if ($request->hasParameter('_no')) {
      $seguimiento->localizo_lead = false;
      $seguimiento->status = 0;
    } else {
      $seguimiento->localizo_lead = true;
    }

    $seguimiento->agent_localizo_lead = $this->getUser()->getId();
    $seguimiento->save();

    if ($seguimiento->localizo_lead === true ||
        $seguimiento->localizo_lead === false && $seguimiento->intento == 2) {
      $this->getUser()->setFlash('notice', "El seguimiento ha terminado.");
    } else {
      $this->getUser()->setFlash('notice', "Necesitas asignarle otro miembro TAB.");
    }
    $this->redirect('@encuesta_show?id=' . $seguimiento->lead_id);
  }

  /**
   * esto se ejecuta para que aunque SIN HABER LOCALIZADO AL LEAD se finalize el seguimiento
   */
  public function executeFinalizar(sfWebRequest $request)
  {
    $seguimiento = $this->getRoute()->getObject();
    $seguimiento->status = 0;
    $seguimiento->save();

    $this->redirect('@encuesta_show?id=' . $seguimiento->lead_id);
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->form = new SeguimientoForm($this->getRoute()->getObject());
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->form = new SeguimientoForm($this->getRoute()->getObject());

    $this->form->bind($request->getParameter($this->form->getName()));
    if ($this->form->isValid())
    {
      $seguimiento = $this->form->save();

      $this->redirect('@encuesta_show?id='.$seguimiento['lead_id']);
    }

    $this->setTemplate('edit');
  }
}
