<?php ob_start('Markdown') ?>
# Manual de Usuario

### Registrar un lead

Un lead llama al call center para registrar sus datos, al mismo tiempo se le
aplicará una encuesta para conocerlo mejor.

Un agente utiliza la función de `Nueva Encuesta` para llenar estos datos.

![Nueva Encuesta](<?php echo image_path('user/Screenshot1.jpg') ?>)

Una vez que una encuesta se almacena no puede ser modificada más que por un
usuario administrador.

Los datos que no tienen * en su nombre no son obligatorios.


### Asignar un TAB team member a un lead

La pantalla `Leads sin TAB` muestra a todos los leads que han sido
encuestados pero que aún no se les ha asignado un distribuidor TAB. Las encuestas
son mostradas de la más antigua a la más reciente:

![Leads sin TAB](<?php echo image_path('user/Screenshot2.jpg') ?>)

Esta pantalla no muestra a los leads que están siendo editados por otro usuario
en ese momento (aunque no tengan un distribuidor asignado aún). El botón `Nueva Encuesta`
permite regresar a la pantalla anterior para dar de alta un nuevo Lead.

Para asignar un distribuidor a un Lead se selecciona un lead de la lista, ya sea
seleccionando el nombre o el número de Interacción. Esta acción dirige a la
pantalla de datos del lead:

![Datos del lead](<?php echo image_path('user/Screenshot_lea2_usr.jpg') ?>)

Aquí, al final de la hoja, se encuentra el botón de
`Asignar miembro TAB`. Este botón asigna automáticamente un nuevo distribuidor TAB
al lead en base a los siguientes parámetros:

1. Busca un distribuidor que tenga el mismo nombre de ciudad y estado que el
   lead.
2. Si no lo encuentra, busca un distribuidor que tenga el mismo nombre de
   estado que el lead. (El sistema supone que hay mínimo un distribuidor en
   cada estado de la república).
3. Si hay varios distribuidores en la misma ciudad o estado, los ordena de
   acuerdo a:
   1. El número de veces que se les ha asignado un lead de manera
      ascendente (esto se conoce como `tally`). De manera que un distribuidor
      al que no se le haya asignado ningún lead se escogerá antes que uno
      que sí.
   2. El desempeño del distribuidor de manera descendente. Este campo es
      proporcionado por Herbalife. Los distribuidores con mejor desempeño
      son escogidos primero.

Después de presionar el botón, el agente tiene que localizar al distribuidor para
hacerle conocer los datos del lead que le fué asignado. En la pantalla de información
del lead aparecerá, en la parte derecha de la pantalla, los datos de contacto del
distribuidor TAB, pero los agentes cuentan con otros medios de búsqueda que también
pueden y deben utilizar:

![Datos del TAB Team](<?php echo image_path('user/Screenshot_nue3.jpg') ?>)

Si no se localiza al distribuidor TAB se selecciona la opción `no` y se debe
solicitar un nuevo distribuidor, por medio del botón `Asignar Miembro TAB`.

Si se localiza al distribuidor TAB, se selecciona `sí`. Una vez localizado al TAB,
el agente no necesita realizar ninguna otra operación con este lead en este momento
del proceso.

Este proceso se puede realizar cuando el agente tenga tiempo libre (durante
encuestas) o en un horario determinado, dependiendo de las necesidades del
departemento responsable.


### Seguimiento

Hay dos tablas de seguimiento.

1. Primera vuelta. Son los leads a los que se les asignó un distribuidor hace 48
  horas.
2. Segunda vuelta. Son los leads a los que se les asignó un segundo
  distribuidor después del período inicial de 48 horas. Se muestran
  aquellos leads que han estado con este nuevo distribuidor TAB más de 24 horas.

Los leads que aparecen en la lista de segunda vuelta tienen mayor prioridad
(deben de ser atendidos primero), por esta razón aparecen primero en la página de
seguimiento.

![Seguimiento](<?php echo image_path('user/Screenshot_seg1.jpg') ?>)

Los leads que aparecen con una linea sobre ellos, son aquellos cuyo horario
preferente de contacto no coincide con el horario actual del sistema, aquellos
leads sin esta línea están en el horario actual y será mas fácil hacer contacto
con ellos si se tratan de localizar en este momento.


### Seguimiento primera vuelta

Esta tabla `Primera Vuelta`, dentro de la sección `Seguimiento`, muestra los leads a
los que les fué asignado un distribuidor TAB hace 48 horas, el agente tiene que
seleccionar alguno de ellos para saber si el distribuidor se puso en contacto con él.
En caso afirmativo se selecciona la casilla `Sí` y aquí termina el proceso:

![Finalizar seguimiento](<?php echo image_path('user/Screenshot_seg2.jpg') ?>)

Si el distribuidor no ha contactado al lead después de esas 48 horas, el agente
deberá asignará a otro distribuidor mediante la opción `Solicitar nuevo distribuidor`,
de esta manera el lead pasa a la `Segunda vuelta`.


### Seguimiento segunda vuelta

Esta tabla `Segunda Vuelta`, dentro de la sección `Seguimiento`, muestra los leads a
los que les fué asignado un distribuidor hace 24 horas, después de que en la primer
vuelta no fué contactado por ningún distribuidor. El agente tiene que seleccionar
alguno de ellos para saber si este segundo distribuidor se puso en contacto con él.
En caso afirmativo se selecciona la casilla `Sí` y aquí termina el proceso.

Si este segundo distribuidor no ha contactado al lead después de esas 24 horas,
el agente deberá seleccionar la casilla `No` y aquí termina el proceso.


### Asignar un ID de distribuidor a un lead

Los miembros del TAB Team que logren convertir en distribuidor a un lead enviarán el
ID de distribuidor de esos leads a los agentes del call center. Estos deben ingresar
estos IDs en el sistema.

Para esto se necesita buscar al lead, lo cuál se puede hacer a través de la página de
`Encuestas`, que permite ver a todos los leads registrados en el sistema. Esta vista
cuenta con filtros de:

- Nombre
- Apellido Paterno
- Fecha de Nacimiento
- Estado
- Ciudad

Una vez localizado al lead se da click en su nombre para ir a la página con la información
del lead. En la parte superior derecha, debajo del menú de navegación, se encuentra la
liga `Asignar ID`:

![Link de Asignar ID](<?php echo image_path('user/Screenshot_lea2_usr.jpg') ?>)

al seleccionar esta liga nos dirige a una forma que nos permite ingresar el número de
distribuidor que se le asignó a ese lead. __Una vez ingresado un número no puede ser cambiado
más que por un administrador:__

![Forma para asignar ID](<?php echo image_path('user/asignar_id.jpg') ?>)


Glosario
========

- Agente. Persona del call center.
- Lead. El entrevistado, la persona que llamó a Herbalife porque le interesa
  consumir o distribuir sus productos.
- TAB Team member. Miembro de Herbalife que distribuye productos y dá
  seguimiento a uno o varios lead.

<?php ob_end_flush() ?>
