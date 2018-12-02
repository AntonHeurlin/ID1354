<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
use TastyRecipes\Util\Constants;
use TastyRecipes\Model\Entry;

/**
 * Shows the chat conversation, allows the user to add and delete entries.
 *
 * @author Leif Lindback, leifl@kth.se
 */
class StoreEntry extends AbstractRequestHandler {

    private $msg;
    private $msgSection;

    public function setMsg($msg) {
      if(!empty($msg) && ctype_print($msg)){
        $this->msg = $msg;
      }
    }

    public function setMsgSection($msgSection){
      $this->msgSection = $msgSection;
    }

    protected function doExecute() {
        $contr = $this->session->get(Constants::CHAT_CONTR_KEY);

        if(!empty($this->msg)){
          $contr->addEntry(new Entry($contr->getUsername(), $this->msg), $this->msgSection);
        }

        if($this->msgSection == 'AmericanPancake'){
          $this->addVariable(Constants::CHAT_ENTRIES_VAR, $contr->getReviews(TRUE, $this->msgSection));
          $this->addVariable(Constants::CHAT_USERNAME_VAR, $contr->getUsername());
          $this->session->set(Constants::CHAT_CONTR_KEY, $contr);
          return 'AmericanPancakePage';
        }
        if($this->msgSection == 'SwedishPancake'){
          $this->addVariable(Constants::CHAT_ENTRIES_VAR, $contr->getReviews(TRUE, $this->msgSection));
          $this->addVariable(Constants::CHAT_USERNAME_VAR, $contr->getUsername());
          $this->session->set(Constants::CHAT_CONTR_KEY, $contr);
          return 'SwedishPancakePage';
        }
    }

}
