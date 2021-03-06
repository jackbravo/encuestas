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
      'medio_contacto_id'      => new sfWidgetFormDoctrineChoice(array('model' => 'MedioContacto', 'add_empty' => true)),
      'origen_datos'           => new sfWidgetFormInput(),
      'my_dist_id'             => new sfWidgetFormInput(),
      'agent_my_dist_id'       => new sfWidgetFormDoctrineChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'fecha_my_dist_id'       => new sfWidgetFormDateTime(),
      'rangos_horario'         => new sfWidgetFormInput(),
      'nombre'                 => new sfWidgetFormInput(),
      'apellido_p'             => new sfWidgetFormInput(),
      'apellido_m'             => new sfWidgetFormInput(),
      'nacimiento'             => new sfWidgetFormDate(),
      'genero'                 => new sfWidgetFormInput(),
      'telefono1'              => new sfWidgetFormInput(),
      'ext1'                   => new sfWidgetFormInput(),
      'tel_tipo1'              => new sfWidgetFormInput(),
      'telefono2'              => new sfWidgetFormInput(),
      'ext2'                   => new sfWidgetFormInput(),
      'tel_tipo2'              => new sfWidgetFormInput(),
      'telefono3'              => new sfWidgetFormInput(),
      'ext3'                   => new sfWidgetFormInput(),
      'tel_tipo3'              => new sfWidgetFormInput(),
      'email'                  => new sfWidgetFormInput(),
      'estado_id'              => new sfWidgetFormDoctrineChoice(array('model' => 'Estado', 'add_empty' => false)),
      'ciudad_id'              => new sfWidgetFormDoctrineChoice(array('model' => 'Ciudad', 'add_empty' => false)),
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
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorDoctrineChoice(array('model' => 'Encuesta', 'column' => 'id', 'required' => false)),
      'agente_id'              => new sfValidatorDoctrineChoice(array('model' => 'sfGuardUser', 'required' => false)),
      'viewer_id'              => new sfValidatorDoctrineChoice(array('model' => 'sfGuardUser', 'required' => false)),
      'last_dist_id'           => new sfValidatorDoctrineChoice(array('model' => 'Distribuidor', 'required' => false)),
      'medio_contacto_id'      => new sfValidatorDoctrineChoice(array('model' => 'MedioContacto', 'required' => false)),
      'origen_datos'           => new sfValidatorInteger(array('required' => false)),
      'my_dist_id'             => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'agent_my_dist_id'       => new sfValidatorDoctrineChoice(array('model' => 'sfGuardUser', 'required' => false)),
      'fecha_my_dist_id'       => new sfValidatorDateTime(array('required' => false)),
      'rangos_horario'         => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'nombre'                 => new sfValidatorString(array('max_length' => 255)),
      'apellido_p'             => new sfValidatorString(array('max_length' => 255)),
      'apellido_m'             => new sfValidatorString(array('max_length' => 255)),
      'nacimiento'             => new sfValidatorDate(),
      'genero'                 => new sfValidatorString(array('max_length' => 1)),
      'telefono1'              => new sfValidatorString(array('max_length' => 10)),
      'ext1'                   => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'tel_tipo1'              => new sfValidatorInteger(array('required' => false)),
      'telefono2'              => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'ext2'                   => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'tel_tipo2'              => new sfValidatorInteger(array('required' => false)),
      'telefono3'              => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'ext3'                   => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'tel_tipo3'              => new sfValidatorInteger(array('required' => false)),
      'email'                  => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'estado_id'              => new sfValidatorDoctrineChoice(array('model' => 'Estado')),
      'ciudad_id'              => new sfValidatorDoctrineChoice(array('model' => 'Ciudad')),
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

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveDistribuidoresList($con);
    $this->saveHorariosList($con);
    $this->saveAreasInteresList($con);
    $this->saveProductosInteresList($con);
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

    $existing = $this->object->Distribuidores->getPrimaryKeys();
    $values = $this->getValue('distribuidores_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Distribuidores', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Distribuidores', array_values($link));
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

    $existing = $this->object->Horarios->getPrimaryKeys();
    $values = $this->getValue('horarios_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Horarios', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Horarios', array_values($link));
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

    $existing = $this->object->AreasInteres->getPrimaryKeys();
    $values = $this->getValue('areas_interes_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('AreasInteres', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('AreasInteres', array_values($link));
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

    $existing = $this->object->ProductosInteres->getPrimaryKeys();
    $values = $this->getValue('productos_interes_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('ProductosInteres', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('ProductosInteres', array_values($link));
    }
  }

}
