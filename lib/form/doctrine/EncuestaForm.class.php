<?php

/**
 * Encuesta form.
 *
 * @package    form
 * @subpackage Encuesta
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class EncuestaForm extends BaseEncuestaForm
{
  public function configure()
  {
    unset($this['agente_id'], $this['created_at'], $this['updated_at'],
      $this['viewer_id'], $this['last_dist_id'], $this['distribuidores_list']);

    $this->widgetSchema->setLabels(array(
      'apellido_p' => 'Apellido Paterno',
      'apellido_m' => 'Apellido Materno',
      'estado_id' => 'Estado',
      'ciudad' => 'Ciudad o población',
      'horarios_list' => 'Mejor horario para contactarle',
      'areas_interes_list' => '¿A usted le gustaría..?',
      'productos_interes_list' => '¿En qué productos está interesado?',
      'medios_contacto_list' => '¿Cómo se enteró de este número?',
    ));

    $this->widgetSchema['estado_id']->setOption('add_empty', true);

    $this->widgetSchema['notas'] = new sfWidgetFormTextarea(array(), array(
      'rows' => '5', 'cols' => '50'
    ));
    $this->validatorSchema['notas']->setOption('required', false);
    $this->widgetSchema['genero'] = new sfWidgetFormChoice(array(
      'choices' => array('m' => 'masculino', 'f' => 'femenino'),
      'expanded' => true,
    ));
    $this->validatorSchema['genero'] = new sfValidatorChoice(array(
      'choices' => array('m', 'f'),
    ));

    $this->widgetSchema['horarios_list']->setOption('expanded', true);
    $this->widgetSchema['areas_interes_list']->setOption('expanded', true);
    $this->widgetSchema['productos_interes_list']->setOption('expanded', true);
    $this->widgetSchema['medios_contacto_list']->setOption('multiple', false);
    $this->widgetSchema['medios_contacto_list']->setOption('expanded', true);

    $this->validatorSchema['email'] = new sfValidatorEmail(array('required' => false));
    $this->validatorSchema['horarios_list']->setOption('required', true);
    $this->validatorSchema['areas_interes_list']->setOption('required', true);
    $this->validatorSchema['productos_interes_list']->setOption('required', true);
    $this->validatorSchema['medios_contacto_list']->setOption('required', true);
  }
}
