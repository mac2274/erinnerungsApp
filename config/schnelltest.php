<?php

$plain = 'geheim123';
$hash = password_hash($plain, PASSWORD_DEFAULT);

var_dump(password_verify('geheim123', $hash)); // → true
var_dump(password_verify('falsch', $hash));    // → false

