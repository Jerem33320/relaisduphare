<?php

function getArticleURL($index) {

  if (
    !is_numeric($index) ||
    !is_int((int) $index) // "cast" integer : on force $index a être un nombre
  ) {
    throw new Exception('Invalid parameter for getArticleURL. Must be a numeric value');
  }

  return "blog/article/$index";
}

function getRoomURL($type, $index) {

  if (
    !is_string($type) ||
    empty($type)
  ) {
    throw new Exception('Invalid parameter for getRoomURL. Must be a non empty string');
  }

  if (
    !is_numeric($index) ||
    !is_int((int) $index) // "cast" integer : on force $index a être un nombre
  ) {
    throw new Exception('Invalid parameter for getRoomURL. Must be a numeric value');
  }

  return "chambres/$type/$index";
}