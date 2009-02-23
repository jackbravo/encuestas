<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * Encuesta filter form base class.
 *
 * @package    filters
 * @subpackage Encuesta *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseEncuestaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'encuestador_id'         => new sfWidgetFormDoctrineChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'nombre'                 => new sfWidgetFormFilterInput(),
      'apellido_p'             => new sfWidgetFormFilterInput(),
      'apellido_m'             => new sfWidgetFormFilterInput(),
      'rfc'                    => new sfWidgetFormFilterInput(),
      'edad'                   => new sfWidgetFormFilterInput(),
      'genero'                 => new sfWidgetFormFilterInput(),
      'telefono'               => new sfWidgetFormFilterInput(),
      'celular'                => new sfWidgetFormFilterInput(),
      'email'                  => new sfWidgetFormFilterInput(),
      'estado_id'              => new sfWidgetFormDoctrineChoice(array('model' => 'Estado', 'add_empty' => true)),
      'ciudad'                 => new sfWidgetFormFilterInput(),
      'municipio'              => new sfWidgetFormFilterInput(),
      'colonia'                => new sfWidgetFormFilterInput(),
      'calle'                  => new sfWidgetFormFilterInput(),
      'numero'                 => new sfWidgetFormFilterInput(),
      'cp'                     => new sfWidgetFormFilterInput(),
      'created_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'horarios_list'          => new sfWidgetFormDoctrineChoiceMany(array('model' => 'Horario')),
      'areas_interes_list'     => new sfWidgetFormDoctrineChoiceMany(array('model' => 'AreaInteres')),
      'productos_interes_list' => new sfWidgetFormDoctrineChoiceMany(array('model' => 'ProductoInteres')),
      'medios_contacto_list'   => new sfWidgetFormDoctrineChoiceMany(array('model' => 'MedioContacto')),
    ));

    $this->setValidators(array(
      'encuestador_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'nombre'                 => new sfValidatorPass(array('required' => false)),
      'apellido_p'             => new sfValidatorPass(array('required' => false)),
      'apellido_m'             => new sfValidatorPass(array('required' => false)),
      'rfc'                    => new sfValidatorPass(array('required' => false)),
      'edad'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'genero'                 => new sfValidatorPass(array('required' => false)),
      'telefono'               => new sfValidatorPass(array('required' => false)),
      'celular'                => new sfValidatorPass(array('required' => false)),
      'email'                  => new sfValidatorPass(array('required' => false)),
      'estado_id'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Estado', 'column' => 'id')),
      'ciudad'                 => new sfValidatorPass(array('required' => false)),
      'municipio'              => new sfValidatorPass(array('required' => false)),
      'colonia'                => new sfValidatorPass(array('required' => false)),
      'calle'                  => new sfValidatorPass(array('required' => false)),
      'numero'                 => new sfValidatorPass(array('required' => false)),
      'cp'                     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'horarios_list'          => new sfValidatorDoctrineChoiceMany(array('model' => 'Horario', 'required' => false)),
      'areas_interes_list'     => new sfValidatorDoctrineChoiceMany(array('model' => 'AreaInteres', 'required' => false)),
      'productos_interes_list' => new sfValidatorDoctrineChoiceMany(array('model' => 'ProductoInteres', 'required' => false)),
      'medios_contacto_list'   => new sfValidatorDoctrineChoiceMany(array('model' => 'MedioContacto', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('encuesta_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addHorariosListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.EncuestaHorario EncuestaHorario')
          ->andWhereIn('EncuestaHorario.horario_id', $values);
  }

  public function addAreasInteresListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.EncuestaAreaInteres EncuestaAreaInteres')
          ->andWhereIn('EncuestaAreaInteres.area_interes_id', $values);
  }

  public function addProductosInteresListColumnQuery(Doctrine_Query $query, $field, $values)
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
          ->andWhereIn('EncuestaProductoInteres.producto_interes_id', $values);
  }

  public function addMediosContactoListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.EncuestaMedioContacto EncuestaMedioContacto')
          ->andWhereIn('EncuestaMedioContacto.medio_contacto_id', $values);
  }

  public function getModelName()
  {
    return 'Encuesta';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'encuestador_id'         => 'ForeignKey',
      'nombre'                 => 'Text',
      'apellido_p'             => 'Text',
      'apellido_m'             => 'Text',
      'rfc'                    => 'Text',
      'edad'                   => 'Number',
      'genero'                 => 'Text',
      'telefono'               => 'Text',
      'celular'                => 'Text',
      'email'                  => 'Text',
      'estado_id'              => 'ForeignKey',
      'ciudad'                 => 'Text',
      'municipio'              => 'Text',
      'colonia'                => 'Text',
      'calle'                  => 'Text',
      'numero'                 => 'Text',
      'cp'                     => 'Number',
      'created_at'             => 'Date',
      'updated_at'             => 'Date',
      'horarios_list'          => 'ManyKey',
      'areas_interes_list'     => 'ManyKey',
      'productos_interes_list' => 'ManyKey',
      'medios_contacto_list'   => 'ManyKey',
    );
  }
}