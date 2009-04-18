<?php

/**
 * Ciudad form base class.
 *
 * @package    form
 * @subpackage ciudad
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseCiudadForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'estado_id' => new sfWidgetFormDoctrineChoice(array('model' => 'Estado', 'add_empty' => true)),
      'nombre'    => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorDoctrineChoice(array('model' => 'Ciudad', 'column' => 'id', 'required' => false)),
      'estado_id' => new sfValidatorDoctrineChoice(array('model' => 'Estado', 'required' => false)),
      'nombre'    => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('ciudad[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ciudad';
  }

}
