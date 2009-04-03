<?php

/**
 * EncuestaAreaInteres form base class.
 *
 * @package    form
 * @subpackage encuesta_area_interes
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseEncuestaAreaInteresForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'encuesta_id'     => new sfWidgetFormInputHidden(),
      'area_interes_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'encuesta_id'     => new sfValidatorDoctrineChoice(array('model' => 'EncuestaAreaInteres', 'column' => 'encuesta_id', 'required' => false)),
      'area_interes_id' => new sfValidatorDoctrineChoice(array('model' => 'EncuestaAreaInteres', 'column' => 'area_interes_id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('encuesta_area_interes[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EncuestaAreaInteres';
  }

}
