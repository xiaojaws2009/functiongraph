<?php

function handler($event, $context) {
    $output = json_encode($event);
    echo 'Hello world!';
    return $output;
}
