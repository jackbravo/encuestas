<?php

/**
 * Seguimiento form base class.
 *
 * @package    form
 * @subpackage seguimiento
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseSeguimientoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'distribuidor_id'     => new sfWidgetFormDoctrineSelect(array('model' => 'Distribuidor', 'add_empty' => true)),
      'lead_id'             => new sfWidgetFormDoctrineSelect(array('model' => 'Encuesta', 'add_empty' => true)),
      'agente_id'           => new sfWidgetFormDoctrineSelect(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'localizo_dist'       => new sfWidgetFormInputCheckbox(),
      'fecha_localizo_dist' => new sfWidgetFormDateTime(),
      'localizo_lead'       => new sfWidgetFormInputCheckbox(),
      'fecha_localizo_lead' => new sfWidgetFormDateTime(),
      'intento'             => new sfWidgetFormInput(),
      'status'              => new sfWidgetFormInput(),
      'notas'               => new sfWidgetFormInput(),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorDoctrineChoice(array('model' => 'Seguimiento', 'column' => 'id', 'required' => false)),
      'distribuidor_id'     => new sfValidatorDoctrineChoice(array('model' => 'Distribuidor', 'required' => false)),
      'lead_id'             => new sfValidatorDoctrineChoice(array('model' => 'Encuesta', 'required' => false)),
      'agente_id'           => new sfValidatorDoctrineChoice(array('model' => 'sfGuardUser', 'required' => false)),
      'localizo_dist'       => new sfValidatorBoolean(array('required' => false)),
      'fecha_localizo_dist' => new sfValidatorDateTime(array('required' => false)),
      'localizo_lead'       => new sfValidatorBoolean(array('required' => false)),
      'fecha_localizo_lead' => new sfValidatorDateTime(array('required' => false)),
      'intento'             => new sfValidatorInteger(),
      'status'              => new sfValidatorInteger(),
      'notas'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'          => new sfValidatorDateTime(array('required' => false)),
      'updated_at'          => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('seguimiento[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Seguimiento';
  }

}