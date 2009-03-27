<?php

/**
 * Project form base class.
 *
 * @package    form
 * @version    SVN: $Id: sfDoctrineFormBaseTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
abstract class BaseFormDoctrine extends sfFormDoctrine
{
  public function __construct($object = null, $options = array(), $CSRFSecret = null)
  {
    parent::__construct($object, $options, $CSRFSecret);

    foreach ($this->validatorSchema->getFields() as $name => $validator)
    {
      if ($validator->getOption('required'))
      {
        $class = $this->widgetSchema[$name]->getAttribute('class');
        $this->widgetSchema[$name]->setAttribute('class', $class . " required");
      }
    }
  }

  public function setup()
  {
    sfWidgetFormSchema::setDefaultFormFormatterName('div');
  }
}
