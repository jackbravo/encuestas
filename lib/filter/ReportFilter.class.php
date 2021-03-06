<?php

class ReportFilter extends sfForm
{
  public function configure()
  {
    $this->widgetSchema['fecha'] = new sfWidgetFormDateRange(array(
      'from_date' => new sfWidgetFormJQueryDate(array(
        'culture' => 'es_MX', 'format' => '%day%/%month%/%year%',
        'image' => '/tvpresence/images/calendar.gif',
      )),
      'to_date' => new sfWidgetFormJQueryDate(array(
        'culture' => 'es_MX', 'format' => '%day%/%month%/%year%',
        'image' => '/tvpresence/images/calendar.gif',
      )),
      'template' => 'entre %from_date% y %to_date%',
    ));

    $this->validatorSchema['fecha'] = new sfValidatorDateRange(array(
      'from_date' => new sfValidatorDate(array('required' => false)),
      'to_date' => new sfValidatorDate(array('required' => false)),
    ));

    $this->widgetSchema->setDefaults(array(
      'fecha' => array(
        'from' => date('Y-m-d', time() - 60 * 60 * 24 * 30),
        'to' => date('Y-m-d'),
      ),
    ));

    $this->widgetSchema->setNameFormat('filter[%s]');
  }

  public function getValues()
  {
    $values = parent::getValues();

    if (empty($values)) {
      return $this->widgetSchema->getDefaults();
    } else {
      return $values;
    }
  }

  public function getValue($name)
  {
    $value = parent::getValue($name);

    if (empty($value)) {
      return $this->widgetSchema->getDefault($name);
    } else {
      return $value;
    }
  }
}
