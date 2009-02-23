<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * EncuestaAreaInteres filter form base class.
 *
 * @package    filters
 * @subpackage EncuestaAreaInteres *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseEncuestaAreaInteresFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('encuesta_area_interes_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EncuestaAreaInteres';
  }

  public function getFields()
  {
    return array(
      'encuesta_id'     => 'Number',
      'area_interes_id' => 'Number',
    );
  }
}