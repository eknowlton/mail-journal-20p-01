<?php

function extractEmail($string) {
    preg_match("/[\._a-zA-Z0-9-]+@[\._a-zA-Z0-9-]+/i", $string, $matches);
    return $matches[0];
}

function getReminderIdFromEmail($email) {
    $parts = explode('@', $email);
    return $parts[0];
}