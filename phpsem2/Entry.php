<?php

/**
 * Holds one entry in the conversation.
 */
class Entry {

    private $nick_name;
    private $msg;
    private $timestamp;
    private $deleted;

    public function __construct($nick_name, $msg) {
        $this->nick_name = $nick_name;
        $this->msg = $msg;
        $this->timestamp = date('Y-m-d H:i:s');
        $this->deleted = false;
    }

    /**
     * @return string The author's nick name.
     */
    public function getNickName() {
        return $this->nick_name;
    }

    /**
     * @return string The message.
     */
    public function getMsg() {
        return $this->msg;
    }

    /**
     * @return int The time (on the server) when this entry was created.
     */
    public function getTimestamp() {
        return $this->timestamp;
    }

    /**
     * @return boolean True if the entry has been deleted.
     */
    public function isDeleted() {
        return $this->deleted;
    }

    /**
     * @param boolean $deleted Set to true if the entry shall be deleted.
     */
    public function setDeleted($deleted) {
        $this->deleted = $deleted;
    }

}
