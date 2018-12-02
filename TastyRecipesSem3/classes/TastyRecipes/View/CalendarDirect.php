<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
use Chat\Util\Constants;

/**
 * Starts a session and shows a view
 * where the user shall specify nick name.
 *
 * @author Leif Lindback, leifl@kth.se
 */
class CalendarDirect extends AbstractRequestHandler {

    protected function doExecute() {
        $this->session->restart();
        return 'CalendarPage';
    }

}
