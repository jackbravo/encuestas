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

    $years = range(1900, date('Y'));
    $this->widgetSchema['created_at'] = new sfWidgetFormFilterDate(array(
      'from_date' => new sfWidgetFormDate(array(
        'format' => '%day%/%month%/%year%',
        'years' => array_combine($years, $years),
      )),
      'to_date' => new sfWidgetFormDate(array(
        'format' => '%day%/%month%/%year%',
        'years' => array_combine($years, $years),
      )),
      'template' => '%from_date% -<br/>%to_date%',
      'with_empty' => false,
    ));
    $this->widgetSchema['nacimiento'] = new sfWidgetFormFilterDate(array(
      'from_date' => new sfWidgetFormDate(array(
        'format' => '%day%/%month%/%year%',
        'years' => array_combine($years, $years),
      )),
      'to_date' => new sfWidgetFormDate(array(
        'format' => '%day%/%month%/%year%',
        'years' => array_combine($years, $years),
      )),
      'template' => '%from_date% -<br/>%to_date%',
      'with_empty' => false,
    ));

    $this->widgetSchema['nombre']->setOption('with_empty', false);
    $this->widgetSchema['nombre']->setAttribute('size', '15');
    $this->widgetSchema['apellido_p']->setOption('with_empty', false);
    $this->widgetSchema['apellido_p']->setAttribute('size', '15');
    $this->widgetSchema['apellido_m']->setOption('with_empty', false);
    $this->widgetSchema['apellido_m']->setAttribute('size', '15');
    $this->widgetSchema['estado_id']->setOption('add_empty', 'cualquier estado');

    $this->widgetSchema->setLabels(array(
      'apellido_p' => 'Apellido Paterno',
      'apellido_m' => 'Apellido Materno',
      'estado_id' => 'en',
      'created_at' => 'Fecha de Registro',
    ));
  }
}
