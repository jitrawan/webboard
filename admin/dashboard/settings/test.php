<?php
$file = "../../resource/beaner/images/beaner1.JPG";
if (!unlink($file))
  {
  echo ("Error deleting $file");
  }
else
  {
  echo ("Deleted $file");
  }
?>
