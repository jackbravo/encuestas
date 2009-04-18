<?php

/**
 * ciudad actions.
 *
 * @package    encuesta-herbalife
 * @subpackage ciudad
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class ciudadActions extends sfActions
{
  public function executeAjaxList(sfWebRequest $request)
  {
    $this->getResponse()->setContentType('application/json');

    $ciudades = Doctrine::getTable('Ciudad')->findForAjax(
      $request->getParameter('id')
    );

    return $this->renderText( json_encode($ciudades) );
  }
}
