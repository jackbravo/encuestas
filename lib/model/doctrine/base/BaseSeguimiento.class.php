<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BaseSeguimiento extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('seguimiento');
        $this->hasColumn('id', 'integer', 4, array('type' => 'integer', 'primary' => true, 'autoincrement' => true, 'length' => '4'));
        $this->hasColumn('distribuidor_id', 'integer', 4, array('type' => 'integer', 'length' => '4'));
        $this->hasColumn('lead_id', 'integer', 4, array('type' => 'integer', 'length' => '4'));
        $this->hasColumn('agente_id', 'integer', 4, array('type' => 'integer', 'length' => '4'));
        $this->hasColumn('localizo_dist', 'boolean', null, array('type' => 'boolean', 'notnull' => true, 'default' => false));
        $this->hasColumn('fecha_localizo_dist', 'timestamp', null, array('type' => 'timestamp'));
        $this->hasColumn('localizo_agente', 'boolean', null, array('type' => 'boolean', 'notnull' => true, 'default' => false));
        $this->hasColumn('fecha_localizo_agente', 'timestamp', null, array('type' => 'timestamp'));
        $this->hasColumn('intento', 'integer', 4, array('type' => 'integer', 'notnull' => true, 'length' => '4'));


        $this->index('intento_idx', array('fields' => array(0 => 'intento')));
    }

    public function setUp()
    {
        $this->hasOne('Distribuidor', array('local' => 'distribuidor_id',
                                            'foreign' => 'id',
                                            'onDelete' => 'CASCADE'));

        $this->hasOne('Encuesta as Lead', array('local' => 'lead_id',
                                                'foreign' => 'id',
                                                'onDelete' => 'CASCADE'));

        $this->hasOne('sfGuardUser as Agente', array('local' => 'agente_id',
                                                     'foreign' => 'id',
                                                     'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}