<?php

namespace TastyRecipes\Controller;

use TastyRecipes\Integration\DBhandler;
use TastyRecipes\Model\Entry;
use TastyRecipes\Model\User;

/**
 * This is the application's sole controller. All calls from view to lower layers pass through here.
 */
class Controller {

    private $dbhandler;
    private $username;
    private $currentUser;

    /**
     * Constructs a new instance.
     */
    public function __construct() {
        $this->dbhandler = new DBhandler();
    }

    /**
     * Appends a new entry to the current conversation.
     *
     * @param \Chat\Model\Entry $entry The entry to append.
     */
    public function addEntry(Entry $entry, $msgSection) {
        $this->dbhandler->addEntry($entry, $msgSection);
    }

    /**
     * @param boolean $removeDeleted If true, the returned array will not include delted entries.
     * @return array                 The conversation, as an array of <code>Entry</code> objects.
     */
    /* public function getConversation2($removeDeleted = false) {
         return $this->conversation->getConversation($removeDeleted);
     }*/

     public function getReviews($removeDeleted = false, $recipeSite) {
         return $this->dbhandler->getReviews($recipeSite, $removeDeleted);
     }

    /**
     * Login is not implemented, the specified username is simply stored and used to identify
     * the user in the conversation.
     *
     * @param type $username The user's nick name, which is shown in the conversation.
     */
    public function login($username, $password) {
        $this->currentUser = $this->dbhandler->findUser($username);
        if($this->currentUser->login($username, $password) && $this->currentUser != null){
          $this->username = $this->currentUser->getNickName();
        }
        else{
          $this->username = 'Fel';
        }
    }

    /**
     * @return string The user's username, which is also the display name.
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * Delete the entry with the specified timestamp.
     *
     * @param int $timestamp The timestamp of the entry that shall be deleted.
     */
    public function deleteEntry($timestamp, $recipeSite) {
        $this->dbhandler->deleteEntry($timestamp, $recipeSite);
    }

}
