<?php

// Dump and Die

// Dumps the varaibale contents to the browser and prevents further script execution

function dd($data) {
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    die();
}

?>