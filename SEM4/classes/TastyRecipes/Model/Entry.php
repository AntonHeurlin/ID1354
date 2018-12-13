<?php

namespace TastyRecipes\Model;


/**
 * Holds one entry in the conversation.
 */
class Entry implements \JsonSerializable{

    public $nick_name;
    public $msg;
    public $timestamp;
    public $deleted;

    /**
     * Constructs a new, not deleted, entry with the timestamp set to the time when this constructor is called.
     */
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

    public function jsonSerialize(){
      $json_obj = new \stdClass;
      $json_obj->nick_name = $this->nick_name;
      $json_obj->msg = $this->msg;
      $json_obj->timestamp = $this->timestamp;
      $json_obj->deleted = $this->deleted;
      return $json_obj;
    }

}
