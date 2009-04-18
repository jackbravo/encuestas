<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BaseEstado extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('estado');
        $this->hasColumn('id', 'integer', 4, array('type' => 'integer', 'primary' => true, 'autoincrement' => true, 'length' => '4'));
        $this->hasColumn('nombre', 'string', 255, array('type' => 'string', 'notnull' => true, 'length' => '255'));
    }

    public function setUp()
    {
        $this->hasMany('Encuesta as Encuestas', array('local' => 'id',
                                                      'foreign' => 'estado_id'));

        $this->hasMany('Ciudad as Ciudades', array('local' => 'id',
                                                   'foreign' => 'estado_id'));
    }
}