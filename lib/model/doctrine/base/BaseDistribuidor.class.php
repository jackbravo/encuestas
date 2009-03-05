<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BaseDistribuidor extends sfDoctrineRecord
{
  public function setTableDefinition()
  {
    $this->setTableName('distribuidor');
    $this->hasColumn('id', 'integer', 4, array('type' => 'integer', 'primary' => true, 'length' => '4'));
    $this->hasColumn('name', 'string', 255, array('type' => 'string', 'length' => '255'));
    $this->hasColumn('level', 'string', 50, array('type' => 'string', 'length' => '50'));
    $this->hasColumn('city', 'string', 100, array('type' => 'string', 'length' => '100'));
    $this->hasColumn('state', 'string', 100, array('type' => 'string', 'length' => '100'));
    $this->hasColumn('contact1', 'string', 100, array('type' => 'string', 'length' => '100'));
    $this->hasColumn('contact2', 'string', 100, array('type' => 'string', 'length' => '100'));
    $this->hasColumn('contact3', 'string', 100, array('type' => 'string', 'length' => '100'));
    $this->hasColumn('tally', 'integer', 4, array('type' => 'integer', 'notnull' => true, 'default' => 0, 'length' => '4'));
    $this->hasColumn('performance', 'integer', 4, array('type' => 'integer', 'length' => '4'));
    $this->hasColumn('m1_vp', 'integer', 4, array('type' => 'integer', 'length' => '4'));
    $this->hasColumn('m1_ro', 'integer', 4, array('type' => 'integer', 'length' => '4'));
    $this->hasColumn('m2_vp', 'integer', 4, array('type' => 'integer', 'length' => '4'));
    $this->hasColumn('m2_ro', 'integer', 4, array('type' => 'integer', 'length' => '4'));
    $this->hasColumn('m3_vp', 'integer', 4, array('type' => 'integer', 'length' => '4'));
    $this->hasColumn('m3_ro', 'integer', 4, array('type' => 'integer', 'length' => '4'));
  }

  public function setUp()
  {
    $this->hasMany('Encuesta as Encuestas', array('local' => 'id',
                                                  'foreign' => 'last_dist_id'));

    $this->hasMany('Encuesta as Leads', array('refClass' => 'Seguimiento',
                                              'local' => 'distribuidor_id',
                                              'foreign' => 'encuesta_id'));

    $this->hasMany('Seguimiento', array('local' => 'id',
                                        'foreign' => 'distribuidor_id'));
  }
}