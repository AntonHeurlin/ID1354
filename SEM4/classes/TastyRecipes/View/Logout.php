<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
use TastyRecipes\Controller\Controller;
use TastyRecipes\Util\Constants;

class Logout extends AbstractRequestHandler{

  public function doExecute(){
    $this->session->invalidate();
    $this->session->restart();
    return 'HomePage';
  }

}
