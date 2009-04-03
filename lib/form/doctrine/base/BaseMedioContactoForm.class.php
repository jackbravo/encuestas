<?php

/**
 * MedioContacto form base class.
 *
 * @package    form
 * @subpackage medio_contacto
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseMedioContactoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'descripcion' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => 'MedioContacto', 'column' => 'id', 'required' => false)),
      'descripcion' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('medio_contacto[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MedioContacto';
  }

}
