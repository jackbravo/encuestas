<?php

/**
 * reportes actions.
 *
 * @package    encuesta-herbalife
 * @subpackage reportes
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class reportesActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->filter = $this->getFilter($request);
    $fecha = $this->filter->getValue('fecha');

    $this->agents = Doctrine::getTable('sfGuardUser')->getAgentsNames();

    $this->leads_per_agent = Doctrine::getTable('Encuesta')
      ->getLeadsPerAgents($fecha['from'], $fecha['to']);
    $this->tab_tries_per_agent = Doctrine::getTable('Seguimiento')
      ->getTabTriesPerAgents($fecha['from'], $fecha['to']);
  }

  public function getFilter($request)
  {
    $filter = new ReportFilter();

    if ($request->hasParameter('filter'))
    {
      $filter->bind($request->getParameter('filter'));
    }

    return $filter;
  }
}
