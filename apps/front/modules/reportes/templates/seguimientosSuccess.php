<?php

echo '"' . implode('","', array_keys($segs[0])) . "\"\n";

foreach ($segs as $seg)
{
  echo '"' . implode('","', $seg) . "\"\n";
}
