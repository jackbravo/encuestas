<?php

/**
 * Encuesta filter form.
 *
 * @package    filters
 * @subpackage Encuesta *
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class EncuestaFormFilter extends BaseEncuestaFormFilter
{
  public function configure()
  {
    $this->widgetSchema['nombre']->setOption('with_empty', false);
    $this->widgetSchema['nombre']->setOption('template', '%input%');
    $this->widgetSchema['apellido_p']->setOption('with_empty', false);
    $this->widgetSchema['apellido_p']->setOption('template', '%input%');
    $this->widgetSchema['estado_id']->setOption('add_empty', 'cualquier estado');

    $this->widgetSchema->setLabels(array(
      'apellido_p' => 'Apellido Paterno',
      'estado_id' => 'en',
    ));
  }
}
