<?php

/**
 * EncuestaHorario form base class.
 *
 * @package    form
 * @subpackage encuesta_horario
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseEncuestaHorarioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'encuesta_id' => new sfWidgetFormInputHidden(),
      'horario_id'  => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'encuesta_id' => new sfValidatorDoctrineChoice(array('model' => 'EncuestaHorario', 'column' => 'encuesta_id', 'required' => false)),
      'horario_id'  => new sfValidatorDoctrineChoice(array('model' => 'EncuestaHorario', 'column' => 'horario_id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('encuesta_horario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EncuestaHorario';
  }

}