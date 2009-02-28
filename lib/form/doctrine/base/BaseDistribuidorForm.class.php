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
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInput(),
      'level'       => new sfWidgetFormInput(),
      'city'        => new sfWidgetFormInput(),
      'state'       => new sfWidgetFormInput(),
      'contact1'    => new sfWidgetFormInput(),
      'contact2'    => new sfWidgetFormInput(),
      'contact3'    => new sfWidgetFormInput(),
      'tally'       => new sfWidgetFormInput(),
      'performance' => new sfWidgetFormInput(),
      'm1_vp'       => new sfWidgetFormInput(),
      'm1_ro'       => new sfWidgetFormInput(),
      'm2_vp'       => new sfWidgetFormInput(),
      'm2_ro'       => new sfWidgetFormInput(),
      'm3_vp'       => new sfWidgetFormInput(),
      'm3_ro'       => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => 'Distribuidor', 'column' => 'id', 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'level'       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'city'        => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'state'       => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'contact1'    => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'contact2'    => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'contact3'    => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'tally'       => new sfValidatorInteger(),
      'performance' => new sfValidatorInteger(array('required' => false)),
      'm1_vp'       => new sfValidatorInteger(array('required' => false)),
      'm1_ro'       => new sfValidatorInteger(array('required' => false)),
      'm2_vp'       => new sfValidatorInteger(array('required' => false)),
      'm2_ro'       => new sfValidatorInteger(array('required' => false)),
      'm3_vp'       => new sfValidatorInteger(array('required' => false)),
      'm3_ro'       => new sfValidatorInteger(array('required' => false)),
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