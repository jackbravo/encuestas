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
      'id'                     => new sfWidgetFormInputHidden(),
      'agente_id'              => new sfWidgetFormDoctrineChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'viewer_id'              => new sfWidgetFormDoctrineChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'last_dist_id'           => new sfWidgetFormDoctrineChoice(array('model' => 'Distribuidor', 'add_empty' => true)),
      'nombre'                 => new sfWidgetFormInput(),
      'apellido_p'             => new sfWidgetFormInput(),
      'apellido_m'             => new sfWidgetFormInput(),
      'edad'                   => new sfWidgetFormInput(),
      'genero'                 => new sfWidgetFormInput(),
      'telefono'               => new sfWidgetFormInput(),
      'celular'                => new sfWidgetFormInput(),
      'email'                  => new sfWidgetFormInput(),
      'estado_id'              => new sfWidgetFormDoctrineChoice(array('model' => 'Estado', 'add_empty' => false)),
      'ciudad'                 => new sfWidgetFormInput(),
      'municipio'              => new sfWidgetFormInput(),
      'colonia'                => new sfWidgetFormInput(),
      'calle'                  => new sfWidgetFormInput(),
      'numero'                 => new sfWidgetFormInput(),
      'cp'                     => new sfWidgetFormInput(),
      'notas'                  => new sfWidgetFormInput(),
      'created_at'             => new sfWidgetFormDateTime(),
      'updated_at'             => new sfWidgetFormDateTime(),
      'distribuidores_list'    => new sfWidgetFormDoctrineChoiceMany(array('model' => 'Distribuidor')),
      'horarios_list'          => new sfWidgetFormDoctrineChoiceMany(array('model' => 'Horario')),
      'areas_interes_list'     => new sfWidgetFormDoctrineChoiceMany(array('model' => 'AreaInteres')),
      'productos_interes_list' => new sfWidgetFormDoctrineChoiceMany(array('model' => 'ProductoInteres')),
      'medios_contacto_list'   => new sfWidgetFormDoctrineChoiceMany(array('model' => 'MedioContacto')),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorDoctrineChoice(array('model' => 'Encuesta', 'column' => 'id', 'required' => false)),
      'agente_id'              => new sfValidatorDoctrineChoice(array('model' => 'sfGuardUser', 'required' => false)),
      'viewer_id'              => new sfValidatorDoctrineChoice(array('model' => 'sfGuardUser', 'required' => false)),
      'last_dist_id'           => new sfValidatorDoctrineChoice(array('model' => 'Distribuidor', 'required' => false)),
      'nombre'                 => new sfValidatorString(array('max_length' => 255)),
      'apellido_p'             => new sfValidatorString(array('max_length' => 255)),
      'apellido_m'             => new sfValidatorString(array('max_length' => 255)),
      'edad'                   => new sfValidatorInteger(),
      'genero'                 => new sfValidatorString(array('max_length' => 1)),
      'telefono'               => new sfValidatorString(array('max_length' => 50)),
      'celular'                => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'email'                  => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'estado_id'              => new sfValidatorDoctrineChoice(array('model' => 'Estado')),
      'ciudad'                 => new sfValidatorString(array('max_length' => 50)),
      'municipio'              => new sfValidatorString(array('max_length' => 50)),
      'colonia'                => new sfValidatorString(array('max_length' => 50)),
      'calle'                  => new sfValidatorString(array('max_length' => 50)),
      'numero'                 => new sfValidatorString(array('max_length' => 50)),
      'cp'                     => new sfValidatorInteger(),
      'notas'                  => new sfValidatorString(array('max_length' => 255)),
      'created_at'             => new sfValidatorDateTime(array('required' => false)),
      'updated_at'             => new sfValidatorDateTime(array('required' => false)),
      'distribuidores_list'    => new sfValidatorDoctrineChoiceMany(array('model' => 'Distribuidor', 'required' => false)),
      'horarios_list'          => new sfValidatorDoctrineChoiceMany(array('model' => 'Horario', 'required' => false)),
      'areas_interes_list'     => new sfValidatorDoctrineChoiceMany(array('model' => 'AreaInteres', 'required' => false)),
      'productos_interes_list' => new sfValidatorDoctrineChoiceMany(array('model' => 'ProductoInteres', 'required' => false)),
      'medios_contacto_list'   => new sfValidatorDoctrineChoiceMany(array('model' => 'MedioContacto', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('encuesta[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Encuesta';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['distribuidores_list']))
    {
      $this->setDefault('distribuidores_list', $this->object->Distribuidores->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['horarios_list']))
    {
      $this->setDefault('horarios_list', $this->object->Horarios->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['areas_interes_list']))
    {
      $this->setDefault('areas_interes_list', $this->object->AreasInteres->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['productos_interes_list']))
    {
      $this->setDefault('productos_interes_list', $this->object->ProductosInteres->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['medios_contacto_list']))
    {
      $this->setDefault('medios_contacto_list', $this->object->MediosContacto->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveDistribuidoresList($con);
    $this->saveHorariosList($con);
    $this->saveAreasInteresList($con);
    $this->saveProductosInteresList($con);
    $this->saveMediosContactoList($con);
  }

  public function saveDistribuidoresList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['distribuidores_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $this->object->unlink('Distribuidores', array());

    $values = $this->getValue('distribuidores_list');
    if (is_array($values))
    {
      $this->object->link('Distribuidores', $values);
    }
  }

  public function saveHorariosList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['horarios_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $this->object->unlink('Horarios', array());

    $values = $this->getValue('horarios_list');
    if (is_array($values))
    {
      $this->object->link('Horarios', $values);
    }
  }

  public function saveAreasInteresList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['areas_interes_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $this->object->unlink('AreasInteres', array());

    $values = $this->getValue('areas_interes_list');
    if (is_array($values))
    {
      $this->object->link('AreasInteres', $values);
    }
  }

  public function saveProductosInteresList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['productos_interes_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $this->object->unlink('ProductosInteres', array());

    $values = $this->getValue('productos_interes_list');
    if (is_array($values))
    {
      $this->object->link('ProductosInteres', $values);
    }
  }

  public function saveMediosContactoList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['medios_contacto_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $this->object->unlink('MediosContacto', array());

    $values = $this->getValue('medios_contacto_list');
    if (is_array($values))
    {
      $this->object->link('MediosContacto', $values);
    }
  }

}