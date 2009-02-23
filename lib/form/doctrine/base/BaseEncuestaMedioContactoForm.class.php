<?php

/**
 * EncuestaMedioContacto form base class.
 *
 * @package    form
 * @subpackage encuesta_medio_contacto
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseEncuestaMedioContactoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'encuesta_id'       => new sfWidgetFormInputHidden(),
      'medio_contacto_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'encuesta_id'       => new sfValidatorDoctrineChoice(array('model' => 'EncuestaMedioContacto', 'column' => 'encuesta_id', 'required' => false)),
      'medio_contacto_id' => new sfValidatorDoctrineChoice(array('model' => 'EncuestaMedioContacto', 'column' => 'medio_contacto_id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('encuesta_medio_contacto[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EncuestaMedioContacto';
  }

}