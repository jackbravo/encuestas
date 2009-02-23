<?php

/**
 * Encuesta form.
 *
 * @package    form
 * @subpackage Encuesta
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class EncuestaForm extends BaseEncuestaForm
{
  public function configure()
  {
    unset($this['encuestador_id'], $this['created_at'], $this['updated_at']);
  }
}
