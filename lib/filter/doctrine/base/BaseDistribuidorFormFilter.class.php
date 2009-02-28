<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * Distribuidor filter form base class.
 *
 * @package    filters
 * @subpackage Distribuidor *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseDistribuidorFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('distribuidor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Distribuidor';
  }

  public function getFields()
  {
    return array(
      'id'     => 'Number',
      'nombre' => 'Text',
    );
  }
}