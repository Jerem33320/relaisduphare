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