<?php

/**
 * Encuesta form base class.
 *
 * @package    form
 * @subpackage encuesta
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseEncuestaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'encuestador_id' => new sfWidgetFormDoctrineSelect(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'nombre'         => new sfWidgetFormInput(),
      'apellido_p'     => new sfWidgetFormInput(),
      'apellido_m'     => new sfWidgetFormInput(),
      'rfc'            => new sfWidgetFormInput(),
      'edad'           => new sfWidgetFormInput(),
      'genero'         => new sfWidgetFormInput(),
      'telefono'       => new sfWidgetFormInput(),
      'celular'        => new sfWidgetFormInput(),
      'email'          => new sfWidgetFormInput(),
      'estado_id'      => new sfWidgetFormDoctrineSelect(array('model' => 'Estado', 'add_empty' => true)),
      'ciudad'         => new sfWidgetFormInput(),
      'delegacion'     => new sfWidgetFormInput(),
      'municipio'      => new sfWidgetFormInput(),
      'colonia'        => new sfWidgetFormInput(),
      'calle'          => new sfWidgetFormInput(),
      'numero'         => new sfWidgetFormInput(),
      'cp'             => new sfWidgetFormInput(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorDoctrineChoice(array('model' => 'Encuesta', 'column' => 'id', 'required' => false)),
      'encuestador_id' => new sfValidatorDoctrineChoice(array('model' => 'sfGuardUser', 'required' => false)),
      'nombre'         => new sfValidatorString(array('max_length' => 255)),
      'apellido_p'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'apellido_m'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'rfc'            => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'edad'           => new sfValidatorInteger(array('required' => false)),
      'genero'         => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'telefono'       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'celular'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'email'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'estado_id'      => new sfValidatorDoctrineChoice(array('model' => 'Estado', 'required' => false)),
      'ciudad'         => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'delegacion'     => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'municipio'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'colonia'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'calle'          => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'numero'         => new sfValidatorInteger(array('required' => false)),
      'cp'             => new sfValidatorInteger(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(array('required' => false)),
      'updated_at'     => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('encuesta[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Encuesta';
  }

}