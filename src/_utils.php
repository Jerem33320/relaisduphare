<?php

/**
 * Determines if a string contains a digit
 *
 * @param string $string
 * @return boolean
 */
function containsDigit($string)
{
  return (boolean)preg_match("/\d/", $string);
}

function isEmailValid($email)
{
  return (boolean)filter_var($email, FILTER_VALIDATE_EMAIL);
}

function isPhoneValid($phone)
{
  return (boolean)preg_match("/^0[0-9](?:(-?[0-9]{2}){4})$/", $phone);
}


function getArticleURL($index)
{

  if (!is_numeric($index) ||
    !is_int((int)$index) // "cast" integer : on force $index a être un nombre
  ) {
    throw new Exception('Invalid parameter for getArticleURL. Must be a numeric value');
  }

  return "blog/article/$index";
}

function getRoomURL($type, $index)
{

  if (!is_string($type) ||
    empty($type)) {
    throw new Exception('Invalid parameter for getRoomURL. Must be a non empty string');
  }

  if (!is_numeric($index) ||
    !is_int((int)$index) // "cast" integer : on force $index a être un nombre
  ) {
    throw new Exception('Invalid parameter for getRoomURL. Must be a numeric value');
  }

  return "chambres/$type/$index";
}