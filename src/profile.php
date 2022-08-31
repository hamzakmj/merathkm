<?php
require __DIR__.'/../src/bootstrap.php';
if (is_get_request()){
    [$errors,$inputs]= session_flash('errors','inputs');
}