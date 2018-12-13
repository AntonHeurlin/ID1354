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
class Userinformation extends AbstractRequestHandler {


    protected function doExecute() {
        $contr = $this->session->get(Constants::CHAT_CONTR_KEY);
        $result =$contr->getUsername();
        $this->session->set(Constants::CHAT_CONTR_KEY, $contr);

        $resp = new \stdClass();
        $resp->value = $result;
        echo \json_encode($resp);
        echo \json_encode($username);

    }

}
