<?php

/**
 * leads actions.
 *
 * @package    encuesta-herbalife
 * @subpackage leads
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class leadsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
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
      $this->getUser()->setAttribute('leads_filter', $this->getDefaultFilter());
      $this->redirect('@leads');
    }

    if ($request->getParameter('_id') != '')
    {
      $this->goToEncuesta($request->getParameter('_id'));
    }

    $this->filter = $this->getFilter($request);

    $this->filter->bind($request->getParameter('encuesta_filters'));
    if ($this->filter->isValid())
    {
      $this->getUser()->setAttribute('leads_filter', $this->filter->getValues());
      $this->redirect('@leads');
    }

    $this->pager = $this->getPager($request, $this->filter);
    $this->setTemplate('index');
  }

  public function goToEncuesta($id)
  {
    if (is_numeric($id)) {
      $this->redirect('@encuesta_show?id=' . $id);
    } else {
      $this->getUser()->setFlash('error', 'El registro debe ser sólo números');
    }
  }

  protected function getPager($request, $filter)
  {
    $pager = new sfDoctrinePager('Encuesta',
      sfConfig::get('app_max_encuestas_on_index')
    );
    $pager->setQuery($filter->buildQuery(
      $this->getUser()->getAttribute('leads_filter', $this->getDefaultFilter())
    ));
    $pager->setPage($request->getParameter('page', 1));
    $pager->setTableMethod('getLeadsQuery');
    $pager->init();

    return $pager;
  }

  protected function getFilter($request)
  {
    $filter = new EncuestaFormFilter(
      $this->getUser()->getAttribute('leads_filter', $this->getDefaultFilter())
    );

    return $filter;
  }

  protected function getDefaultFilter()
  {
    return array(
    );
  }
}
