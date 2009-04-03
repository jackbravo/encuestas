<?php

/**
 * Distribuidor form base class.
 *
 * @package    form
 * @subpackage distribuidor
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseDistribuidorForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInput(),
      'level'       => new sfWidgetFormInput(),
      'city'        => new sfWidgetFormInput(),
      'state'       => new sfWidgetFormInput(),
      'contact1'    => new sfWidgetFormInput(),
      'contact2'    => new sfWidgetFormInput(),
      'contact3'    => new sfWidgetFormInput(),
      'tally'       => new sfWidgetFormInput(),
      'performance' => new sfWidgetFormInput(),
      'm1_vp'       => new sfWidgetFormInput(),
      'm1_ro'       => new sfWidgetFormInput(),
      'm2_vp'       => new sfWidgetFormInput(),
      'm2_ro'       => new sfWidgetFormInput(),
      'm3_vp'       => new sfWidgetFormInput(),
      'm3_ro'       => new sfWidgetFormInput(),
      'leads_list'  => new sfWidgetFormDoctrineChoiceMany(array('model' => 'Encuesta')),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => 'Distribuidor', 'column' => 'id', 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'level'       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'city'        => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'state'       => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'contact1'    => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'contact2'    => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'contact3'    => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'tally'       => new sfValidatorInteger(),
      'performance' => new sfValidatorInteger(array('required' => false)),
      'm1_vp'       => new sfValidatorInteger(array('required' => false)),
      'm1_ro'       => new sfValidatorInteger(array('required' => false)),
      'm2_vp'       => new sfValidatorInteger(array('required' => false)),
      'm2_ro'       => new sfValidatorInteger(array('required' => false)),
      'm3_vp'       => new sfValidatorInteger(array('required' => false)),
      'm3_ro'       => new sfValidatorInteger(array('required' => false)),
      'leads_list'  => new sfValidatorDoctrineChoiceMany(array('model' => 'Encuesta', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('distribuidor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Distribuidor';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['leads_list']))
    {
      $this->setDefault('leads_list', $this->object->Leads->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveLeadsList($con);
  }

  public function saveLeadsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['leads_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Leads->getPrimaryKeys();
    $values = $this->getValue('leads_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Leads', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Leads', array_values($link));
    }
  }

}
