<?php

/**
 * distribuidor actions.
 *
 * @package    encuesta-herbalife
 * @subpackage distribuidor
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class distribuidorActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->distribuidor_list = $this->getRoute()->getObjects();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->distribuidor = $this->getRoute()->getObject();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new DistribuidorForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = new DistribuidorForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->form = new DistribuidorForm($this->getRoute()->getObject());
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->form = new DistribuidorForm($this->getRoute()->getObject());

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->getRoute()->getObject()->delete();

    $this->redirect('@distribuidor');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
      $distribuidor = $form->save();

      $this->redirect('@distribuidor_edit?id='.$distribuidor['id']);
    }
  }
}
