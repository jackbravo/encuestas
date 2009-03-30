<?php

class axaiToolkit
{
  public static function toKeyValueArray($key, $value, $array)
  {
    $result = array();
    foreach ($array as $row)
    {
      $result[ $row[$key] ] = $row[$value];
    }
    return $result;
  }
}
