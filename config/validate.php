<?php

function sanitize_text($value) {
  return trim(filter_var($value ?? '', FILTER_SANITIZE_STRING));
}

function is_required($value) {
  return isset($value) && trim($value) !== '';
}

function is_valid_date($value) {
  $d = DateTime::createFromFormat('Y-m-d', $value);
  return $d && $d->format('Y-m-d') === $value;
}

function is_valid_time($value) {
  $t = DateTime::createFromFormat('H:i', $value);
  if ($t && $t->format('H:i') === $value) {
    return true;
  }
  $t = DateTime::createFromFormat('H:i:s', $value);
  return $t && $t->format('H:i:s') === $value;
}
