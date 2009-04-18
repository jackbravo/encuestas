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
    unset($this['agente_id'], $this['created_at'], $this['updated_at'],
      $this['viewer_id'], $this['last_dist_id'], $this['distribuidores_list'],
      $this['my_dist_id'], $this['rangos_horario']);

    $this->widgetSchema['estado_id']->setOption('add_empty', true);

    $this->widgetSchema['notas'] = new sfWidgetFormTextarea(array(), array(
      'rows' => '5', 'cols' => '50'
    ));
    $this->validatorSchema['notas']->setOption('required', false);
    $this->widgetSchema['genero'] = new sfWidgetFormChoice(array(
      'choices' => array('m' => 'masculino', 'f' => 'femenino'),
      'expanded' => true,
    ));
    $this->validatorSchema['genero'] = new sfValidatorChoice(array(
      'choices' => array('m', 'f'),
    ));
    $this->widgetSchema['origen_datos'] = new sfWidgetFormChoice(array(
      'choices' => array('1' => 'teléfono', '2' => 'email'),
      'expanded' => true,
    ));
    $this->validatorSchema['origen_datos'] = new sfValidatorChoice(array(
      'choices' => array('1', '2'),
    ));

    $years = range(1900, date('Y'));
    $this->widgetSchema['nacimiento'] = new sfWidgetFormI18nDate(array(
      'culture' => 'es_MX',
      'years' => array_combine($years, $years),
    ));
    $this->widgetSchema['horarios_list']->setOption('expanded', true);
    $this->widgetSchema['areas_interes_list']->setOption('expanded', true);
    $this->widgetSchema['productos_interes_list']->setOption('expanded', true);
    $this->widgetSchema['medio_contacto_id']->setOption('expanded', true);
    $this->widgetSchema['medio_contacto_id']->setOption('add_empty', false);

    $this->validatorSchema['email'] = new sfValidatorEmail(array('required' => false));
    $this->validatorSchema['horarios_list']->setOption('required', true);
    $this->validatorSchema['areas_interes_list']->setOption('required', true);
    $this->validatorSchema['medio_contacto_id']->setOption('required', true);

    foreach (array(1, 2, 3) as $num)
    {
      $this->widgetSchema['tel_tipo' . $num] = new sfWidgetFormChoice(array(
        'choices' => array(1 => 'casa', 2 => 'oficina', 3 => 'celular', 4 => 'nextel'),
      ));
      $this->widgetSchema['ext' . $num]->setAttribute('size', 5);
      $this->validatorSchema['telefono' . $num] = new sfValidatorAnd(
        array(
          new sfValidatorRegex(array('pattern' => '/^(\d)+$/'), array('invalid' => 'No debe contener letras')),
          new sfValidatorString(array('max_length' => '10', 'min_length' => 10), array('max_length' => 'Muy largo, debe tener 10 caracteres', 'min_length' => 'Muy corto, debe contener 10 caracteres')),
        ),
        array('required' => false)
      );
    }
    $this->validatorSchema['telefono1']->setOption('required', true);

    $this->widgetSchema->setLabels(array(
      'apellido_p' => 'Apellido Paterno',
      'apellido_m' => 'Apellido Materno',
      'estado_id' => 'Estado',
      'nacimiento' => 'Fecha de Nacimiento',
      'ciudad_id' => 'Ciudad o población',
      'horarios_list' => 'Mejor horario para contactarle',
      'areas_interes_list' => '¿A usted le gustaría..?',
      'productos_interes_list' => '¿En qué productos está interesado?',
      'medio_contacto_id' => '¿Cómo se enteró de este número?',
      'origen_datos' => 'Origen de los datos',
    ));
  }

  public function yaExiste()
  {
    return $this->getObject()->getTable()->createQuery('e')
      ->addWhere('e.nombre = ?', $this->getValue('nombre'))
      ->addWhere('e.apellido_p = ?', $this->getValue('apellido_p'))
      ->addWhere('e.apellido_m = ?', $this->getValue('apellido_m'))
      ->addWhere('e.nacimiento = ?', $this->getValue('nacimiento'))
      ->fetchOne();
  }
}
