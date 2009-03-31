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
  }
}
