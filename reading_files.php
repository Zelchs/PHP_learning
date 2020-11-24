<?php

$file = "example.txt";


if ($handle = fopen($file, "r")) {

    echo $content = fread($handle, 10); //Each bite equals a character
    // or we  can use function called "filesize($file)" 
    // instead of bytes to read whole document

    fclose($handle);
} else {
    echo "Application could not write on the file";
}
