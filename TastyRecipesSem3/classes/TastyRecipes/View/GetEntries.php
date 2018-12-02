<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
use TastyRecipes\Util\Constants;

/**
 * Shows the chat conversation, allows the user to add and delete entries.
 *
 * @author Leif Lindback, leifl@kth.se
 */
class GetEntries extends AbstractRequestHandler {

    protected function doExecute() {
        $contr = $this->session->get(Constants::CHAT_CONTR_KEY);

        $this->addVariable(Constants::CHAT_ENTRIES_VAR, $contr->getReviews(TRUE));
        $this->addVariable(Constants::CHAT_USERNAME_VAR, $contr->getUsername());

        $this->session->set(Constants::CHAT_CONTR_KEY, $contr);
        return Constants::CHAT_CONVERSATION_VIEW;
    }

}
