<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * Ciudad filter form base class.
 *
 * @package    filters
 * @subpackage Ciudad *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseCiudadFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'estado_id' => new sfWidgetFormDoctrineChoice(array('model' => 'Estado', 'add_empty' => true)),
      'nombre'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'estado_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Estado', 'column' => 'id')),
      'nombre'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ciudad_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ciudad';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'estado_id' => 'ForeignKey',
      'nombre'    => 'Text',
    );
  }
}