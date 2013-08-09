<?php
  header('Content-Type: text/cache-manifest');
  echo "CACHE MANIFEST\n";

  $dir = new RecursiveDirectoryIterator(".");
  foreach(new RecursiveIteratorIterator($dir) as $file) {
    if ($file->IsFile() &&
        $file->getFilename() != "manifest.php" &&
        substr($file->getFilename(), 0, 1) != "." &&
        !strpos($file, DIRECTORY_SEPARATOR . '.'))
    {
      $file_name = $file->getPathName();
      if (DIRECTORY_SEPARATOR == "\\") {
        $file_name = strtr($file_name, '\\', '/');
      }
      echo $file_name . "\n";
    }
  }
?>