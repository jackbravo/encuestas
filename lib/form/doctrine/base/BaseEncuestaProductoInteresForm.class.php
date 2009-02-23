<?php

/**
 * EncuestaProductoInteres form base class.
 *
 * @package    form
 * @subpackage encuesta_producto_interes
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseEncuestaProductoInteresForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'encuesta_id'         => new sfWidgetFormInputHidden(),
      'producto_interes_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'encuesta_id'         => new sfValidatorDoctrineChoice(array('model' => 'EncuestaProductoInteres', 'column' => 'encuesta_id', 'required' => false)),
      'producto_interes_id' => new sfValidatorDoctrineChoice(array('model' => 'EncuestaProductoInteres', 'column' => 'producto_interes_id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('encuesta_producto_interes[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EncuestaProductoInteres';
  }

}