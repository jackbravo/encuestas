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
    Doctrine::getTable('Encuesta')->unlockAll($this->getUser()->getId());
    $this->filter = $this->getFilter($request);
    $fecha = $this->filter->getValue('fecha');

    $this->agents = Doctrine::getTable('sfGuardUser')->getAgentsNames();

    $this->leads_per_agent = Doctrine::getTable('Encuesta')
      ->getLeadsPerAgents($fecha['from'], $fecha['to']);

    $this->leads_to_dist = Doctrine::getTable('Encuesta')
      ->getLeadsToDistPerAgents($fecha['from'], $fecha['to']);

    // vuelta 1
    $this->tab_tries_per_agent = Doctrine::getTable('Seguimiento')
      ->getTabTriesPerAgents($fecha['from'], $fecha['to']);
    $this->tab_per_agent = Doctrine::getTable('Seguimiento')
      ->getTabPerAgents($fecha['from'], $fecha['to']);
    $this->lead_per_agent = Doctrine::getTable('Seguimiento')
      ->getLeadPerAgents($fecha['from'], $fecha['to']);

    // vuelta 2
    $this->tab_tries_per_agent_2 = Doctrine::getTable('Seguimiento')
      ->getTabTriesPerAgents($fecha['from'], $fecha['to'], 2);
    $this->tab_per_agent_2 = Doctrine::getTable('Seguimiento')
      ->getTabPerAgents($fecha['from'], $fecha['to'], 2);
    $this->lead_per_agent_2 = Doctrine::getTable('Seguimiento')
      ->getLeadPerAgents($fecha['from'], $fecha['to'], 2);

    if ($request->hasParameter('_export'))
    {
      $this->getResponse()->setContentType('text/csv; charset=utf-8');
      $this->getResponse()->setHttpHeader('Content-Disposition', 'attachment; filename=agentes.csv');
      $this->setLayout(false);
      $this->setTemplate('index.csv'); return '';
    }
  }

  public function executeTabs(sfWebRequest $request)
  {
    $this->filter = $this->getFilter($request);
    $fecha = $this->filter->getValue('fecha');

    $this->tabs = Doctrine::getTable('Distribuidor')->getTabNames();

    $this->leads_to_dist = Doctrine::getTable('Encuesta')
      ->getLeadsToDistPerTabs($fecha['from'], $fecha['to']);

    // vuelta 1
    $this->lead_per_tab = Doctrine::getTable('Seguimiento')
      ->getLeadPerTab($fecha['from'], $fecha['to']);
    $this->asign_per_tab = Doctrine::getTable('Seguimiento')
      ->getAsignPerTab($fecha['from'], $fecha['to']);
    $this->asign_actuales_per_tab = Doctrine::getTable('Seguimiento')
      ->getAsignActualesPerTab($fecha['from'], $fecha['to']);
    $this->seg_per_tab = Doctrine::getTable('Seguimiento')
      ->getSegPerTab($fecha['from'], $fecha['to']);

    // vuelta 2
    $this->lead_per_tab_2 = Doctrine::getTable('Seguimiento')
      ->getLeadPerTab($fecha['from'], $fecha['to'], 2);
    $this->asign_per_tab_2 = Doctrine::getTable('Seguimiento')
      ->getAsignPerTab($fecha['from'], $fecha['to'], 2);
    $this->asign_actuales_per_tab_2 = Doctrine::getTable('Seguimiento')
      ->getAsignActualesPerTab($fecha['from'], $fecha['to'], 2);
    $this->seg_per_tab_2 = Doctrine::getTable('Seguimiento')
      ->getSegPerTab($fecha['from'], $fecha['to'], 2);

    if ($request->hasParameter('_export'))
    {
      $this->getResponse()->setContentType('text/csv; charset=utf-8');
      $this->getResponse()->setHttpHeader('Content-Disposition', 'attachment; filename=tabs.csv');
      $this->setLayout(false);
      $this->setTemplate('tabs.csv'); return '';
    }
  }

  public function executeLeadsNoAsign(sfWebRequest $request)
  {
    $this->filter = $this->getFilter($request);
    $fecha = $this->filter->getValue('fecha');

    $this->leads = Doctrine::getTable('Encuesta')->getLeadsNoAsign($fecha['from'], $fecha['to']);

    if ($request->hasParameter('_export'))
    {
      $this->getResponse()->setContentType('text/csv; charset=utf-8');
      $this->getResponse()->setHttpHeader('Content-Disposition', 'attachment; filename=leads_no_asign.csv');
      $this->setLayout(false);
      $this->setTemplate('leadsNoAsign.csv'); return '';
    }
  }

  public function executeTabsNoAsign(sfWebRequest $request)
  {
    $this->tabs = Doctrine::getTable('Distribuidor')->getTabsNoAsign();

    if ($request->hasParameter('_export'))
    {
      $this->getResponse()->setContentType('text/csv; charset=utf-8');
      $this->getResponse()->setHttpHeader('Content-Disposition', 'attachment; filename=tabs_no_asign.csv');
      $this->setLayout(false);
      $this->setTemplate('tabsNoAsign.csv'); return '';
    }
  }

  public function executeExportar(sfWebRequest $request)
  {
  }

  public function executeGlobal(sfWebRequest $request)
  {
    $this->registros = Doctrine::getTable('Encuesta')->getGlobal();

    $this->getResponse()->setContentType('text/csv; charset=utf-8');
    $this->getResponse()->setHttpHeader('Content-Disposition', 'attachment; filename=global.csv');
    $this->setLayout(false);
  }

  public function executeSeguimientos(sfWebRequest $request)
  {
    $this->segs = Doctrine::getTable('Seguimiento')->getForExport();

    $this->getResponse()->setContentType('text/csv; charset=utf-8');
    $this->getResponse()->setHttpHeader('Content-Disposition', 'attachment; filename=seguimientos.csv');
    $this->setLayout(false);
  }

  public function executeEncuestas(sfWebRequest $request)
  {
    $this->segs = Doctrine::getTable('Encuesta')->getForExport();

    $this->getResponse()->setContentType('text/csv; charset=utf-8');
    $this->getResponse()->setHttpHeader('Content-Disposition', 'attachment; filename=encuestas.csv');
    $this->setLayout(false);
  }

  public function executeMetricas(sfWebRequest $request)
  {
    $this->filter = $this->getFilter($request);
    $fecha = $this->filter->getValue('fecha');

    $this->leads_by_email = Doctrine::getTable('Encuesta')->getLeadsByEmail($fecha['from'], $fecha['to']);
    $this->leads_by_phone = Doctrine::getTable('Encuesta')->getLeadsByPhone($fecha['from'], $fecha['to']);
    $this->leads_received = Doctrine::getTable('Encuesta')->getLeadsReceived($fecha['from'], $fecha['to']);
    $this->leads_assigned = Doctrine::getTable('Seguimiento')->getLeadsAssigned($fecha['from'], $fecha['to']);
    $this->leads_followed_up = Doctrine::getTable('Seguimiento')->getLeadsFollowedUp($fecha['from'], $fecha['to']);
    $this->leads_converted = Doctrine::getTable('Encuesta')->getLeadsConverted($fecha['from'], $fecha['to']);
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
