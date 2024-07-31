<?php

class EnvLoader
{
     protected $envData = [];

     public function loadEnv($filePath)
     {
          if (!file_exists($filePath)) {
               throw new Exception("'$filePath' not found.");
          }

          $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
          foreach ($lines as $line) {
               if (strpos(trim($line), '#') === 0) {
                    continue;
               }
               list($key, $value) = explode('=', $line, 2);
               $key = trim($key);
               $value = trim($value);
               if (preg_match('/^\'(.*)\'$/', $value, $matches) || preg_match('/^"(.*)"$/', $value, $matches)) {
                    $value = $matches[1];
               }
               if (!array_key_exists($key, $this->envData)) {
                    putenv("$key=$value");
                    $this->envData[$key] = $value;
               }
          }
     }

     public function getEnv($key)
     {
          return isset($this->envData[$key]) ? $this->envData[$key] : null;
     }
}
