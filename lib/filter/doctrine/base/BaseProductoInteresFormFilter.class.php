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
      'descripcion'    => new sfWidgetFormFilterInput(),
      'encuestas_list' => new sfWidgetFormDoctrineChoiceMany(array('model' => 'Encuesta')),
    ));

    $this->setValidators(array(
      'descripcion'    => new sfValidatorPass(array('required' => false)),
      'encuestas_list' => new sfValidatorDoctrineChoiceMany(array('model' => 'Encuesta', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('producto_interes_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addEncuestasListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.EncuestaProductoInteres EncuestaProductoInteres')
          ->andWhereIn('EncuestaProductoInteres.encuesta_id', $values);
  }

  public function getModelName()
  {
    return 'ProductoInteres';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'descripcion'    => 'Text',
      'encuestas_list' => 'ManyKey',
    );
  }
}