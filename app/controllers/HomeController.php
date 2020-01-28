<?php

namespace App\controllers;

class HomeController
{
  public function index($id)
  {
    echo "This is index" . $id;
  }

  public function about()
  {
    echo "This is about";
  }
}
