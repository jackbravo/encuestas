<?php

class tvpresenceCargarciudadesTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'encuesta1'),
      new sfCommandOption('dir', null, sfCommandOption::PARAMETER_REQUIRED, 'Directorio de CSV'),
      // add your own options here
    ));

    $this->namespace        = 'tvpresence';
    $this->name             = 'cargar-ciudades';
    $this->briefDescription = 'Cargar datos de ciudades o municipios';
    $this->detailedDescription = <<<EOF
El comando [tvpresence:cargar-ciudades|INFO] carga datos de ciudades o
municipios de archivos en formato CSV, sólo se necesita especificar la
ubicación de los archivos.

Para llamarlo utiliza:

  [php symfony tvpresence:cargar-ciudades|INFO --dir="directorio con archivos CSV"]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'] ? $options['connection'] : null)->getConnection();

    $estados = Doctrine::getTable('Estado')->findKeys();
    $stmt = $connection->prepare("INSERT INTO ciudad(nombre, estado_id) VALUES (?, ?)");

    // add your code here
    $files = sfFinder::type('files')->name('*.csv')->in($options['dir']);
    foreach ($files as $file)
    {
      $this->logSection('tvpresence', sprintf('cargando datos de "%s"', $file));

      $handle = fopen($file, 'r');
      fgetcsv($handle); // skip first
      $localidades = array();
      $data = array();
      while (($data = fgetcsv($handle)) !== FALSE) {
        $localidades[empty($data[5]) ? $data[3] : $data[5]] = $estados[$data[4]];
      }

      foreach ($localidades as $localidad => $estado_id) {
        $stmt->execute(array($localidad, $estado_id));
      }
    }
  }
}
