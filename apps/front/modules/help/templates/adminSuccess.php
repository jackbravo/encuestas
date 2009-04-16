<?php ob_start('Markdown') ?>

# Manual de Administrador

Un administrador puede hacer todo lo que un usuario puede hacer y además puede:

- Editar un lead ya registrado o cambiar su ID de distribuidor
- Agregar y editar los usuarios del sistema
- Ver los reportes
- Consultar la base de datos de TABs

### Editar un lead ya registrado o cambiar su ID de distribuidor

Esto se puede hacer desde la página de un lead, los cuales aparecen listados al
seleccionar la opción `Encuestas` en el menú de navegación superior:

![Encuestas](<?php echo image_path('admin/1_editar1.jpg') ?>)

Una vez seleccionado el lead que se quiere editar, en la parte superior derecha
aparecerá un link `Editar` que nos lleva a la forma para editar a un lead:

![Editar lead](<?php echo image_path('admin/1_editar_lead.jpg') ?>)

Desde la página de un lead también hay un link de `Asignar ID` que permite
asignar o cambiar un ID de distribuidor a un lead. __Los administradores son
los únicos usuarios que pueden editar estos datos.__

### Agregar y editar los usuarios del sistema

El administrador tiene acceso en la parte derecha del menú de navegación a la sección de
`Usuarios`. Desde aquí se pueden agregar y editar usuarios del sistema. Esta pantalla
muestra un listado de los usuarios activos en el sistema:

![Usuarios](<?php echo image_path('admin/2_editaruser1.jpg') ?>)

Si se selecciona uno de estos usuarios listados, se puede acceder a la pantalla de edición,
donde se pueden cambiar los datos referentes a este usuario específico, tal como su nombre
de inicio de sesión, contraseña, tipo de permisos y estado actual:

![Editar usuario](<?php echo image_path('admin/2_editaruser2.jpg') ?>)

Al crear un nuevo usuario (botón de `Nuevo` en la parte inferior de la vista de
usuarios) se puede elegir si este usuario va a ser administrador o nó
asignandole ese permiso. Para quitar un permiso desde esta interfaz simplemente
se presiona la tecla `Ctrl` mientras se da click en el nombre del permiso.

### Reportes

Existen los siguientes reportes disponibles para consulta, por medio del menú superior de
navegación:

![Reportes](<?php echo image_path('admin/3_reportes1.jpg') ?>)

- Reportes de Agentes
- Reportes de TAB team
- Reportes de Leads no asignados
- Reportes de TABs sin asignación

Los reportes se filtran por fecha. Se tiene que escoger una fecha y dar click a `filtrar`s
para poder ver un reporte. La fecha predefinida es desde un mes anterior a la fecha actual.

El reporte de `Agentes` muestra información para conocer las actividades realizadas por
cada agente:

![Reporte de Agentes](<?php echo image_path('admin/3_reportes2.jpg') ?>)

El reporte de `TAB Team` muestra información referente a las asignaciones históricas de
Leads hacia cada distribuidor TAB específico:

![Reporte de TAB Team](<?php echo image_path('admin/3_reportes3.jpg') ?>)

El reporte de `Leads no asignados` muestra aquellos leads que aún no tienen asignado ningún
distribuidor TAB para darle seguimiento a su solicitud:

![Reporte de Leads no asignados](<?php echo image_path('admin/3_reportes4.jpg') ?>)

El reporte `TABs sin asignación` muestra un listado de aquellos TABs que aun no tienen
asignado ningún Lead para dar seguimiento:

![Reporte de TABs sin asignación](<?php echo image_path('admin/3_reportes5.jpg') ?>)

Estos reportes pueden exportarse a formato CSV (Comma Separated Value) para su utilización
posterior en herramientas específicas de reporte. Para obtener estos archivos es necesario
presionar el botón `Exportar`, ubicado en la parte superior de cada uno de los reportes.

Las funciones `Exportar tabla de seguimientos`:

![Exportar tabla de seguimientos](<?php echo image_path('admin/3_reportes6.jpg') ?>)

y `Exportar datos de encuestas`:

![Exportar datos de encuestas](<?php echo image_path('admin/3_reportes7.jpg') ?>)

Permiten obtener los archivos CSV de cada una de estas tablas, para ser utilizadas más
adelante en herramientas específicas de reporte.

### TAB Team

Esta opción del menú de navegación muestra a todos los miembros del TAB team registrados
en el sistema durante el momento de la consulta:

![TAB Team](<?php echo image_path('admin/4_tabteam1.jpg') ?>)

Los distribuidores están ordenados de la misma manera en que se ordenan al solicitar un nuevo TAB team para un lead. Es decir:

- El que tenga el `tally` más pequeño primero
- Después ordenados por desempeño
- Finalmente ordenados de acuerdo a la ciudad y al estado al que pertenecen

Consultando esta tabla se puede saber porqué el sistema está asignando cierto distribuidor
a un lead ya que te muestra todos los parametros que toma en cuenta para esa decisión.

Si se selecciona uno TAB Team se puede ver a detalle la información específica relacionada:

![TAB Team](<?php echo image_path('admin/4_tabteam2.jpg') ?>)

<?php ob_end_flush() ?>
