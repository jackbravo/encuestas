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

    $this->widgetSchema->setLabels(array(
      'estado_id' => 'Estado',
      'horarios_list' => 'Mejor horario para contactarle',
      'areas_interes_list' => '¿A usted le gustaría..?',
      'productos_interes_list' => '¿En qué productos está interesado?',
      'medios_contacto_list' => '¿Cómo se enteró de este número?',
    ));
  }
}
