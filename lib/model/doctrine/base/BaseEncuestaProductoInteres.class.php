<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BaseEncuestaProductoInteres extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('encuesta_producto_interes');
        $this->hasColumn('encuesta_id', 'integer', 4, array('type' => 'integer', 'primary' => true, 'length' => '4'));
        $this->hasColumn('producto_interes_id', 'integer', 4, array('type' => 'integer', 'primary' => true, 'length' => '4'));
    }

    public function setUp()
    {
        $this->hasOne('Encuesta', array('local' => 'encuesta_id',
                                        'foreign' => 'id',
                                        'onDelete' => 'CASCADE'));

        $this->hasOne('ProductoInteres', array('local' => 'producto_interes_id',
                                               'foreign' => 'id',
                                               'onDelete' => 'CASCADE'));
    }
}