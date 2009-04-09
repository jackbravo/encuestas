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
    Doctrine::getTable('Encuesta')->unlockAll($this->getUser()->getId());
    $this->filter = $this->getFilter($request);
    $this->pager = $this->getPager($request, $this->filter);
  }

  public function executeFilter(sfWebRequest $request)
  {
    if ($request->hasParameter('_reset'))
    {
      $this->getUser()->setAttribute('distribuidor_filter', $this->getDefaultFilter());
      $this->redirect('@distribuidor');
    }

    if ($request->getParameter('_id') != '')
    {
      $this->redirect('@distribuidor_show?id=' . $request->getParameter('_id'));
    }

    $this->filter = $this->getFilter($request);

    $this->filter->bind($request->getParameter('distribuidor_filters'));
    if ($this->filter->isValid())
    {
      $this->getUser()->setAttribute('distribuidor_filter', $this->filter->getValues());
      $this->redirect('@distribuidor');
    }

    $this->pager = $this->getPager($request, $this->filter);
    $this->setTemplate('index');
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

  protected function getPager($request, $filter)
  {
    $pager = new sfDoctrinePager('Distribuidor',
      sfConfig::get('app_max_encuestas_on_index')
    );
    $pager->setQuery($filter->buildQuery(
      $this->getUser()->getAttribute('distribuidor_filter', $this->getDefaultFilter())
    ));
    $pager->setPage($request->getParameter('page', 1));
    $pager->setTableMethod('orderDistQuery');
    $pager->init();

    return $pager;
  }

  protected function getFilter($request)
  {
    $filter = new DistribuidorFormFilter(
      $this->getUser()->getAttribute('distribuidor_filter', $this->getDefaultFilter())
    );

    return $filter;
  }

  protected function getDefaultFilter()
  {
    return array(
    );
  }
}
