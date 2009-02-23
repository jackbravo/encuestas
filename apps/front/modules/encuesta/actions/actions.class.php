<?php

/**
 * encuesta actions.
 *
 * @package    encuesta-herbalife
 * @subpackage encuesta
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class encuestaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->encuesta_list = $this->getRoute()->getObjects();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->encuesta = $this->getRoute()->getObject();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new EncuestaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = new EncuestaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->form = new EncuestaForm($this->getRoute()->getObject());
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->form = new EncuestaForm($this->getRoute()->getObject());

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->getRoute()->getObject()->delete();

    $this->redirect('@encuesta');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
      $encuesta = $form->save();

      $this->redirect('@encuesta_show?id='.$encuesta['id']);
    }
  }
}
