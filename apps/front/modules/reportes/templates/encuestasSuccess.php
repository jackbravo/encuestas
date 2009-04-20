<?php

echo pack("CCC",0xef,0xbb,0xbf);
echo '"' . implode('","', array_keys($segs[0])) . "\"\n";

foreach ($segs as $seg)
{
  echo '"' . implode('","', $seg) . "\"\n";
}
