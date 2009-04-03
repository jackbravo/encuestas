<?php

include(sfConfig::get('sf_lib_dir')
  . DIRECTORY_SEPARATOR . 'vendor'
  . DIRECTORY_SEPARATOR . 'Markdown'
  . DIRECTORY_SEPARATOR . 'markdown.php');

echo Markdown(<<<EOD

TV Presence - Sistema de encuestas
==================================

### Registrar un lead

Un lead llama al call center para registrar sus datos, al mismo tiempo se le
aplicará una encuesta para conocerlo mejor.

Un agente utiliza la función de `Nueva Encuesta` para llenar estos datos. Una vez
que una encuesta se almacena no puede ser modificada más que por un usuario
administrador.

Los datos que no tienen * en su nombre no son obligatorios.


### Asignar un TAB team member a un lead

La pantalla `Leads sin distribuidor` muestra a todos los leads que han sido
encuestados pero que aún no se les ha asignado un distribuidor. Las encuestas
son mostradas de la más antigua a la más reciente.

Esta pantalla no muestra a los leads que están siendo editados por otro usuario
en ese momento (aunque no tengan un distribuidor asignado aún).

Para asignar un distribuidor se selecciona a un lead. Esta acción dirige a la
pantalla de datos del lead. Aquí, al final de la hoja, se encuentra el botón de
`Solicitar nuevo distribuidor`. Este botón asigna un nuevo distribuidor al lead
en base a los siguientes parámetros:

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

Una vez asignado un distribuidor, el agente tiene que localizar al distribuidor para
hacerle conocer los datos del lead que se le asignó. En la pantalla de información
del lead aparecerán algunos datos del distribuidor, pero los agentes cuentan con
otros medios de búsqueda que también pueden y deben utilizar.

Si no se localiza al distribuidor se selecciona `no` y se debe solicitar un nuevo
distribuidor.

Si se localiza al distribuidor, se selecciona `sí`. Una vez localizado al distribuidor,
el agente no necesita realizar ninguna otra operación con este lead.

Este proceso se puede realizar cuando el agente tenga tiempo libre (durante
encuestas) o en un horario determinado.


### Seguimiento

Hay dos tablas de seguimiento.

1. Primera vuelta. Son los leads a los que se les asignó un distribuidor hace 48
  horas.
2. Segunda vuelta. Son los leads a los que se les asignó un segundo
  distribuidor después de la primer vuelta y hace 24 horas.

Los leads que aparecen en la lista de segunda vuelta tienen mayor prioridad
(deben de ser atendidos primero), por eso aparecen antes en la página de
seguimiento.


### Seguimiento primera vuelta

Esta lista, dentro de la sección `Seguimiento` muestra los leads a los que les fué
asignado un distribuidor hace 48 horas, el agente tiene que seleccionar alguno de
ellos para saber si el distribuidor se puso en contacto con él. En caso afirmativo se
selecciona la casilla `Sí` y aquí termina el proceso.

Si el distribuidor no ha contactado al lead después de esas 48 horas, el agente
deberá asignará a otro distribuidor mediante la opción `Solicitar nuevo distribuidor`,
de esta manera el lead pasa a la `Segunda vuelta`.

### Seguimiento segunda vuelta

Esta lista, dentro de la sección `Seguimiento` muestra los leads a los que les fué
asignado un distribuidor hace 24 horas, después de que en la primer vuelta no fué
contactado por ningún distribuidor. El agente tiene que seleccionar alguno de
ellos para saber si este segundo distribuidor se puso en contacto con él. En caso
afirmativo se selecciona la casilla `Sí` y aquí termina el proceso.

Si este segundo distribuidor no ha contactado al lead después de esas 24 horas,
el agente deberá seleccionar la casilla `No` y aquí termina el proceso.


Glosario
========

- Agente. Persona del call center.
- Lead. El entrevistado, la persona que llamó a Herbalife porque le interesa
  consumir o distribuir sus productos.
- TAB Team member. Miembro de Herbalife que distribuye productos y dá
  seguimiento a uno o varios lead.

EOD
);
