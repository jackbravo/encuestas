<?php

class EncuestaIdForm extends BaseEncuestaForm
{
  public function configure()
  {
    foreach ($this as $name => $field) {
      if ($name == 'my_dist_id' || $name == 'id') continue;
      unset ($this[$name]);
    }
    $this->validatorSchema['my_dist_id']->setOption('required', true);
    $this->widgetSchema->setLabel('my_dist_id', 'ID de distribuidor');

    $this->validatorSchema->setPostValidator(new sfValidatorDoctrineUnique(
      array(
        'model' => 'Encuesta',
        'column' => 'my_dist_id',
      ),
      array(
        'invalid' => 'Ya existe un lead con ese ID'
      )
    ));
  }
}
