<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BaseHorario extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('horario');
        $this->hasColumn('id', 'integer', 4, array('type' => 'integer', 'primary' => true, 'autoincrement' => true, 'length' => '4'));
        $this->hasColumn('descripcion', 'string', 255, array('type' => 'string', 'length' => '255'));
    }

    public function setUp()
    {
        $this->hasMany('Encuesta as Encuestas', array('refClass' => 'EncuestaHorario',
                                                      'local' => 'horario_id',
                                                      'foreign' => 'encuesta_id'));

        $this->hasMany('EncuestaHorario', array('local' => 'id',
                                                'foreign' => 'horario_id'));
    }
}