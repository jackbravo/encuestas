<?php

/**
 * Distribuidor form base class.
 *
 * @package    form
 * @subpackage distribuidor
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseDistribuidorForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'     => new sfWidgetFormInputHidden(),
      'nombre' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'     => new sfValidatorDoctrineChoice(array('model' => 'Distribuidor', 'column' => 'id', 'required' => false)),
      'nombre' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('distribuidor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Distribuidor';
  }

}