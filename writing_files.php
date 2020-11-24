<?php

$file = "example.txt";


if ($handle = fopen($file, "w")) {

    fwrite($handle, "I am learning how to write on file");

    fclose($handle);
} else {
    echo "Application could not write on the file";
}
