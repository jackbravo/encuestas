<?php

/**
 * ProductoInteres form base class.
 *
 * @package    form
 * @subpackage producto_interes
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseProductoInteresForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'descripcion'    => new sfWidgetFormInput(),
      'encuestas_list' => new sfWidgetFormDoctrineChoiceMany(array('model' => 'Encuesta')),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorDoctrineChoice(array('model' => 'ProductoInteres', 'column' => 'id', 'required' => false)),
      'descripcion'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'encuestas_list' => new sfValidatorDoctrineChoiceMany(array('model' => 'Encuesta', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('producto_interes[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProductoInteres';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['encuestas_list']))
    {
      $this->setDefault('encuestas_list', $this->object->Encuestas->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveEncuestasList($con);
  }

  public function saveEncuestasList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['encuestas_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Encuestas->getPrimaryKeys();
    $values = $this->getValue('encuestas_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Encuestas', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Encuestas', array_values($link));
    }
  }

}
