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
    $this->widgetSchema->setFormFormatterName('div');

    $this->widgetSchema['nacimiento'] = new sfWidgetFormDateRange(array(
      'from_date' => new sfWidgetFormJQueryDate(array(
        'culture' => 'es_MX', 'format' => '%day%/%month%/%year%',
        'image' => '/tvpresence/images/calendar.gif',
      )),
      'to_date' => new sfWidgetFormJQueryDate(array(
        'culture' => 'es_MX', 'format' => '%day%/%month%/%year%',
        'image' => '/tvpresence/images/calendar.gif',
      )),
      'template' => '%from_date% -<br/>%to_date%',
    ));

    $this->widgetSchema['nombre']->setOption('with_empty', false);
    $this->widgetSchema['nombre']->setOption('template', '%input%');
    $this->widgetSchema['nombre']->setAttribute('size', '15');
    $this->widgetSchema['apellido_p']->setOption('with_empty', false);
    $this->widgetSchema['apellido_p']->setOption('template', '%input%');
    $this->widgetSchema['apellido_p']->setAttribute('size', '15');
    $this->widgetSchema['estado_id']->setOption('add_empty', 'cualquier estado');
    $this->widgetSchema['ciudad']->setOption('with_empty', false);

    $this->widgetSchema->setLabels(array(
      'apellido_p' => 'Apellido Paterno',
      'estado_id' => 'en',
    ));
  }
}
