<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * ProductoInteres filter form base class.
 *
 * @package    filters
 * @subpackage ProductoInteres *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseProductoInteresFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'descripcion' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'descripcion' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('producto_interes_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProductoInteres';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'descripcion' => 'Text',
    );
  }
}