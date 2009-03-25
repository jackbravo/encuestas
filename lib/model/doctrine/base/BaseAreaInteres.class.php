<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BaseAreaInteres extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('area_interes');
        $this->hasColumn('id', 'integer', 4, array('type' => 'integer', 'primary' => true, 'autoincrement' => true, 'length' => '4'));
        $this->hasColumn('descripcion', 'string', 255, array('type' => 'string', 'length' => '255'));
    }

    public function setUp()
    {
        $this->hasMany('Encuesta as Encuestas', array('refClass' => 'EncuestaAreaInteres',
                                                      'local' => 'area_interes_id',
                                                      'foreign' => 'encuesta_id'));

        $this->hasMany('EncuestaAreaInteres', array('local' => 'id',
                                                    'foreign' => 'area_interes_id'));
    }
}