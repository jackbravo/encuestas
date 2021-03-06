<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BaseEncuestaHorario extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('encuesta_horario');
        $this->hasColumn('encuesta_id', 'integer', 4, array('type' => 'integer', 'primary' => true, 'length' => '4'));
        $this->hasColumn('horario_id', 'integer', 4, array('type' => 'integer', 'primary' => true, 'length' => '4'));
    }

    public function setUp()
    {
        $this->hasOne('Encuesta', array('local' => 'encuesta_id',
                                        'foreign' => 'id',
                                        'onDelete' => 'CASCADE'));

        $this->hasOne('Horario', array('local' => 'horario_id',
                                       'foreign' => 'id',
                                       'onDelete' => 'CASCADE'));
    }
}