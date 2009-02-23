<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * EncuestaMedioContacto filter form base class.
 *
 * @package    filters
 * @subpackage EncuestaMedioContacto *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseEncuestaMedioContactoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('encuesta_medio_contacto_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EncuestaMedioContacto';
  }

  public function getFields()
  {
    return array(
      'encuesta_id'       => 'Number',
      'medio_contacto_id' => 'Number',
    );
  }
}