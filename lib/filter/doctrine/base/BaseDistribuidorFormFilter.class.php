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
      'name'        => new sfWidgetFormFilterInput(),
      'level'       => new sfWidgetFormFilterInput(),
      'city'        => new sfWidgetFormFilterInput(),
      'state'       => new sfWidgetFormFilterInput(),
      'contact1'    => new sfWidgetFormFilterInput(),
      'contact2'    => new sfWidgetFormFilterInput(),
      'contact3'    => new sfWidgetFormFilterInput(),
      'tally'       => new sfWidgetFormFilterInput(),
      'performance' => new sfWidgetFormFilterInput(),
      'm1_vp'       => new sfWidgetFormFilterInput(),
      'm1_ro'       => new sfWidgetFormFilterInput(),
      'm2_vp'       => new sfWidgetFormFilterInput(),
      'm2_ro'       => new sfWidgetFormFilterInput(),
      'm3_vp'       => new sfWidgetFormFilterInput(),
      'm3_ro'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'        => new sfValidatorPass(array('required' => false)),
      'level'       => new sfValidatorPass(array('required' => false)),
      'city'        => new sfValidatorPass(array('required' => false)),
      'state'       => new sfValidatorPass(array('required' => false)),
      'contact1'    => new sfValidatorPass(array('required' => false)),
      'contact2'    => new sfValidatorPass(array('required' => false)),
      'contact3'    => new sfValidatorPass(array('required' => false)),
      'tally'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'performance' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'm1_vp'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'm1_ro'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'm2_vp'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'm2_ro'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'm3_vp'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'm3_ro'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
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
      'id'          => 'Number',
      'name'        => 'Text',
      'level'       => 'Text',
      'city'        => 'Text',
      'state'       => 'Text',
      'contact1'    => 'Text',
      'contact2'    => 'Text',
      'contact3'    => 'Text',
      'tally'       => 'Number',
      'performance' => 'Number',
      'm1_vp'       => 'Number',
      'm1_ro'       => 'Number',
      'm2_vp'       => 'Number',
      'm2_ro'       => 'Number',
      'm3_vp'       => 'Number',
      'm3_ro'       => 'Number',
    );
  }
}