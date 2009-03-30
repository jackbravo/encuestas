<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * Seguimiento filter form base class.
 *
 * @package    filters
 * @subpackage Seguimiento *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseSeguimientoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'distribuidor_id'     => new sfWidgetFormDoctrineChoice(array('model' => 'Distribuidor', 'add_empty' => true)),
      'lead_id'             => new sfWidgetFormDoctrineChoice(array('model' => 'Encuesta', 'add_empty' => true)),
      'agente_id'           => new sfWidgetFormDoctrineChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'localizo_dist'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'fecha_localizo_dist' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'agent_localizo_dist' => new sfWidgetFormDoctrineChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'localizo_lead'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'fecha_localizo_lead' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'agent_localizo_lead' => new sfWidgetFormDoctrineChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'intento'             => new sfWidgetFormFilterInput(),
      'status'              => new sfWidgetFormFilterInput(),
      'notas'               => new sfWidgetFormFilterInput(),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'distribuidor_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Distribuidor', 'column' => 'id')),
      'lead_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Encuesta', 'column' => 'id')),
      'agente_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'localizo_dist'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'fecha_localizo_dist' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'agent_localizo_dist' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'localizo_lead'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'fecha_localizo_lead' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'agent_localizo_lead' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'intento'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'status'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'notas'               => new sfValidatorPass(array('required' => false)),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('seguimiento_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Seguimiento';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'distribuidor_id'     => 'ForeignKey',
      'lead_id'             => 'ForeignKey',
      'agente_id'           => 'ForeignKey',
      'localizo_dist'       => 'Boolean',
      'fecha_localizo_dist' => 'Date',
      'agent_localizo_dist' => 'ForeignKey',
      'localizo_lead'       => 'Boolean',
      'fecha_localizo_lead' => 'Date',
      'agent_localizo_lead' => 'ForeignKey',
      'intento'             => 'Number',
      'status'              => 'Number',
      'notas'               => 'Text',
      'created_at'          => 'Date',
      'updated_at'          => 'Date',
    );
  }
}