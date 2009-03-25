<?php

/**
 * Seguimiento form.
 *
 * @package    form
 * @subpackage Seguimiento
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class SeguimientoForm extends BaseSeguimientoForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at'], $this['agente_id'],
      $this['intento'], $this['status'],
      $this['distribuidor_id'], $this['lead_id'],
      $this['fecha_localizo_dist'], $this['fecha_localizo_lead']);

    $this->widgetSchema['notas'] = new sfWidgetFormTextarea();

    $this->widgetSchema->setLabels(array(
      'localizo_dist' => '¿Localizó al miembro TAB?',
      'localizo_lead' => '¿Localizó al lead?',
    ));
  }
}
