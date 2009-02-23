<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BaseMedioContacto extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('medio_contacto');
        $this->hasColumn('id', 'integer', 4, array('type' => 'integer', 'primary' => true, 'autoincrement' => true, 'length' => '4'));
        $this->hasColumn('descripcion', 'string', 255, array('type' => 'string', 'length' => '255'));
    }

    public function setUp()
    {
        $this->hasMany('EncuestaMedioContacto', array('local' => 'id',
                                                      'foreign' => 'medio_contacto_id'));
    }
}