<?php

foreach (glob(__DIR__ . '/*/*.php') as $file) {
    include_once $file;
}