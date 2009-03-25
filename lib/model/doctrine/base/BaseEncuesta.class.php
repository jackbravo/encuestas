<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BaseEncuesta extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('encuesta');
        $this->hasColumn('id', 'integer', 4, array('type' => 'integer', 'primary' => true, 'autoincrement' => true, 'length' => '4'));
        $this->hasColumn('agente_id', 'integer', 4, array('type' => 'integer', 'length' => '4'));
        $this->hasColumn('viewer_id', 'integer', 4, array('type' => 'integer', 'length' => '4'));
        $this->hasColumn('last_dist_id', 'integer', 4, array('type' => 'integer', 'length' => '4'));
        $this->hasColumn('origen_datos', 'integer', 1, array('type' => 'integer', 'length' => '1'));
        $this->hasColumn('nombre', 'string', 255, array('type' => 'string', 'notnull' => true, 'length' => '255'));
        $this->hasColumn('apellido_p', 'string', 255, array('type' => 'string', 'notnull' => true, 'length' => '255'));
        $this->hasColumn('apellido_m', 'string', 255, array('type' => 'string', 'notnull' => true, 'length' => '255'));
        $this->hasColumn('edad', 'integer', 4, array('type' => 'integer', 'notnull' => true, 'length' => '4'));
        $this->hasColumn('genero', 'string', 1, array('type' => 'string', 'notnull' => true, 'length' => '1'));
        $this->hasColumn('telefono1', 'integer', 4, array('type' => 'integer', 'notnull' => true, 'length' => '4'));
        $this->hasColumn('ext1', 'string', 10, array('type' => 'string', 'length' => '10'));
        $this->hasColumn('tel_tipo1', 'integer', 1, array('type' => 'integer', 'length' => '1'));
        $this->hasColumn('telefono2', 'integer', 4, array('type' => 'integer', 'length' => '4'));
        $this->hasColumn('ext2', 'string', 10, array('type' => 'string', 'length' => '10'));
        $this->hasColumn('tel_tipo2', 'integer', 1, array('type' => 'integer', 'length' => '1'));
        $this->hasColumn('telefono3', 'integer', 4, array('type' => 'integer', 'length' => '4'));
        $this->hasColumn('ext3', 'string', 10, array('type' => 'string', 'length' => '10'));
        $this->hasColumn('tel_tipo3', 'integer', 1, array('type' => 'integer', 'length' => '1'));
        $this->hasColumn('email', 'string', 50, array('type' => 'string', 'length' => '50'));
        $this->hasColumn('estado_id', 'integer', 4, array('type' => 'integer', 'notnull' => true, 'length' => '4'));
        $this->hasColumn('ciudad', 'string', 50, array('type' => 'string', 'notnull' => true, 'length' => '50'));
        $this->hasColumn('colonia', 'string', 50, array('type' => 'string', 'notnull' => true, 'length' => '50'));
        $this->hasColumn('calle', 'string', 50, array('type' => 'string', 'notnull' => true, 'length' => '50'));
        $this->hasColumn('numero', 'string', 50, array('type' => 'string', 'notnull' => true, 'length' => '50'));
        $this->hasColumn('cp', 'integer', 4, array('type' => 'integer', 'notnull' => true, 'length' => '4'));
        $this->hasColumn('notas', 'string', 255, array('type' => 'string', 'notnull' => true, 'default' => '', 'length' => '255'));
    }

    public function setUp()
    {
        $this->hasOne('sfGuardUser as Agente', array('local' => 'agente_id',
                                                     'foreign' => 'id'));

        $this->hasOne('sfGuardUser as Viewer', array('local' => 'viewer_id',
                                                     'foreign' => 'id'));

        $this->hasOne('Distribuidor as LastDist', array('local' => 'last_dist_id',
                                                        'foreign' => 'id'));

        $this->hasMany('Distribuidor as Distribuidores', array('refClass' => 'Seguimiento',
                                                               'local' => 'encuesta_id',
                                                               'foreign' => 'distribuidor_id'));

        $this->hasOne('Estado', array('local' => 'estado_id',
                                      'foreign' => 'id'));

        $this->hasMany('Horario as Horarios', array('refClass' => 'EncuestaHorario',
                                                    'local' => 'encuesta_id',
                                                    'foreign' => 'horario_id'));

        $this->hasMany('AreaInteres as AreasInteres', array('refClass' => 'EncuestaAreaInteres',
                                                            'local' => 'encuesta_id',
                                                            'foreign' => 'area_interes_id'));

        $this->hasMany('ProductoInteres as ProductosInteres', array('refClass' => 'EncuestaProductoInteres',
                                                                    'local' => 'encuesta_id',
                                                                    'foreign' => 'producto_interes_id'));

        $this->hasMany('MedioContacto as MediosContacto', array('refClass' => 'EncuestaMedioContacto',
                                                                'local' => 'encuesta_id',
                                                                'foreign' => 'medio_contacto_id'));

        $this->hasMany('EncuestaHorario', array('local' => 'id',
                                                'foreign' => 'encuesta_id'));

        $this->hasMany('EncuestaAreaInteres', array('local' => 'id',
                                                    'foreign' => 'encuesta_id'));

        $this->hasMany('EncuestaProductoInteres', array('local' => 'id',
                                                        'foreign' => 'encuesta_id'));

        $this->hasMany('EncuestaMedioContacto', array('local' => 'id',
                                                      'foreign' => 'encuesta_id'));

        $this->hasMany('Seguimiento', array('local' => 'id',
                                            'foreign' => 'lead_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}