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
    $this->filter = $this->getFilter($request);
    $this->pager = $this->getPager($request, $this->filter);
  }

  public function executeFilter(sfWebRequest $request)
  {
    if ($request->hasParameter('_reset'))
    {
      $this->getUser()->setAttribute('encuestas_filter', $this->getDefaultFilter());
      $this->redirect('@encuesta');
    }

    if ($request->getParameter('_id') != '')
    {
      $this->goToEncuesta($request->getParameter('_id'));
    }

    $this->filter = $this->getFilter($request);

    $this->filter->bind($request->getParameter('encuesta_filters'));
    if ($this->filter->isValid())
    {
      $this->getUser()->setAttribute('encuestas_filter', $this->filter->getValues());
      $this->redirect('@encuesta');
    }

    $this->pager = $this->getPager($request, $this->filter);
    $this->setTemplate('index');
  }

  public function goToEncuesta($id)
  {
    if (is_numeric($id)) {
      $this->redirect('@encuesta_show?id=' . $id);
    } else {
      $this->getUser()->setFlash('error', 'Interacción # debe ser sólo números');
    }
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->encuesta = $this->getRoute()->getObject();
    $this->encuesta->lock($this->getUser()->getId());
    $this->seguimientos = Doctrine::getTable('Seguimiento')->findForLead($this->encuesta->id);
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

  public function executeEditId(sfWebRequest $request)
  {
    $this->form = new EncuestaIdForm($this->getRoute()->getObject());
  }

  public function executeUpdateId(sfWebRequest $request)
  {
    $this->form = new EncuestaIdForm($this->getRoute()->getObject());

    $this->processForm($request, $this->form);

    $this->setTemplate('editId');
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
      if ($request->hasParameter('id') || ! $form->yaExiste())
      {
        $encuesta = $form->save();

        $this->redirect('@encuesta_show?id='.$encuesta['id']);
      }
      else
      {
        $this->getUser()->setFlash('error', 'El lead especificado ya existe en la base de datos');
      }
    }
  }

  protected function getPager($request, $filter)
  {
    $pager = new sfDoctrinePager('Encuesta',
      sfConfig::get('app_max_encuestas_on_index')
    );
    $pager->setQuery($filter->buildQuery(
      $this->getUser()->getAttribute('encuestas_filter', $this->getDefaultFilter())
    ));
    $pager->setPage($request->getParameter('page', 1));
    $pager->setTableMethod('getListQuery');
    $pager->init();

    return $pager;
  }

  protected function getFilter($request)
  {
    $filter = new EncuestaFormFilter(
      $this->getUser()->getAttribute('encuestas_filter', $this->getDefaultFilter())
    );

    return $filter;
  }

  protected function getDefaultFilter()
  {
    return array(
    );
  }
}
