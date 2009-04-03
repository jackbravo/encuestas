<h1>TV Presence - Sistema de encuestas</h1>

<ul>
  <li><?php echo link_to('Documentación para usuarios', 'help/index') ?></li>
</ul>

<?php

echo Markdown(<<<EOD

Un administrador puede hacer todo lo que un usuario puede hacer y además puede:

- Editar un lead ya registrado o cambiar su ID de distribuidor
- Agregar y editar los usuarios del sistema
- Ver los reportes
- Consultar la base de datos de TABs

### Editar un lead ya registrado o cambiar su ID de distribuidor

Esto se puede hacer desde la página de un lead. En la parte superior derecha
aparecerá un link `Editar` que nos lleva a la forma para editar a un lead.

Desde la página de un lead también hay un link de `Asignar ID` que permite
asignar o cambiar un ID de distribuidor a un lead. __Los administradores son
los únicos usuarios que pueden editar estos datos.__

### Agregar y editar los usuarios del sistema

El administrador tiene acceso en la parte izquierda del menú a la sección de
`Usuarios`. Desde aquí se pueden agregar y editar usuarios del sistema.

Al crear un nuevo usuario (botón de `Nuevo` en la parte inferior de la vista de
usuarios) se puede elegir si este usuario va a ser administrador o nó
asignandole ese permiso. Para quitar un permiso desde esta interfaz simplemente
se presiona la tecla `Ctrl` mientras se da click en el nombre del permiso.

### Reportes

Existen dos tablas de reportes:

- Reportes de agentes
- Reportes de distribuidores

que miden el desempeño de cada uno de esos grupos.

Ambos reportes se filtran por fecha (ya sea escogiendo la fecha con los dropdowns o dando click al calendario). Se tiene que escoger una fecha y dar click a `filtrar` para poder ver un reporte. La fecha predefinida es el día actual.

El reporte de agentes tiene las siguientes columnas (aquí se presentan en inglés, en el sistema están en español, en el mismo orden):

- Leads entered to database per CC agent
- TAB Team member assignment tries per CC agent (48 hours)
- TAB Team member assignment tries per CC agent (24 hours)
- TAB Team member assignments per CC agent (48 hours)
- TAB Team member assignments per CC agent (24 hours)
- TAB Team member follow-up monitored leads per CC agent (48 hours)
- TAB Team member follow-up monitored leads per CC agent (24 hours)
- Lead to Distributor conversions entered per CC agent

Para el reporte de distribuidores se cuenta con las siguientes columnas:

- Lead assignments per TAB Team member (48 hours)
- Lead assignments per TAB Team member (24 hours)
- Lead assignments followed-up per TAB Team member (48 hours)
- Lead assignments followed-up per TAB Team member (24 hours)
- Lead to Distributor conversions per TAB Team member

### Base de datos de TABs

Esta tabla muestra a todos los miembros del TAB team registrados en el sistema durante el momento de la consulta. Los distribuidores están ordenados de la misma manera en que se ordenan al solicitar un nuevo TAB team para un lead. Es decir:

- El que tenga el `tally` más pequeño primero
- Después ordenados por desempeño
- Finalmente ordenados de acuerdo a la ciudad y al estado al que pertenecen

Consultando esta tabla se puede saber porqué el sistema está asignando cierto distribuidor a un lead ya que te muestra todos los parametros que toma en cuenta para esa decisión.

EOD
);
