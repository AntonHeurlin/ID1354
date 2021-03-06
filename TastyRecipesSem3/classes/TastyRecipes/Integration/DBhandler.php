<?php

namespace TastyRecipes\Integration;

use TastyRecipes\Model\Entry;
use Id1354fw\Util\Classes;
use TastyRecipes\Model\User;

/**
 * A facade for the conversation data store. Manages all create/read/update/delete operations on
 * entries in the conversation.
 */
class DBhandler {

    const FILE_NAME = 'AmericanPancakeReviews.txt';
    const PATH_TO_APP_ROOT = '/../../../';
    const ENTRY_DELIMITER = ";\n";

    private $file_path;
    private $file_path2;
    private $file_path3;


    /**
     * Creates a new instance.
     */
    public function __construct() {
          $this->file_path = $_SERVER['DOCUMENT_ROOT'] . Classes::getContextPath() . 'Database/american.txt';
          $this->file_path2 = $_SERVER['DOCUMENT_ROOT'] . Classes::getContextPath() . 'Database/swedish.txt';
          $this->file_path3 = $_SERVER['DOCUMENT_ROOT'] . Classes::getContextPath() . 'Database/Users.txt';
    }

    /**
     * Appends a new entry to the current reviews.
     *
     * @param \TastyRecipes\Model\Entry $entry The entry to append.
     */
    public function addEntry(Entry $entry, $msgSection) {
      if($msgSection == 'AmericanPancake'){
        file_put_contents($this->file_path, \serialize($entry) . self::ENTRY_DELIMITER, FILE_APPEND);
      }
      if($msgSection == 'SwedishPancake'){
        file_put_contents($this->file_path2, \serialize($entry) . self::ENTRY_DELIMITER, FILE_APPEND);
      }
    }

    private function examineReviews($recipeSite, $entry_handler) {
      if($recipeSite == 'SwedishPancake'){
        $entry_strings = \explode(self::ENTRY_DELIMITER, \file_get_contents($this->file_path2));
        $entries = array();
        foreach ($entry_strings as $entry_string) {
            $entry = \unserialize($entry_string);
            if ($entry instanceof Entry) {
                $entry_handler($entries, $entry);
            }
        }
        return $entries;
      }
      if($recipeSite == 'AmericanPancake'){
        $entry_strings = \explode(self::ENTRY_DELIMITER, \file_get_contents($this->file_path));
        $entries = array();
        foreach ($entry_strings as $entry_string) {
            $entry = \unserialize($entry_string);
            if ($entry instanceof Entry) {
                $entry_handler($entries, $entry);
            }
        }
        return $entries;
      }
    }

    /**
     * Delete the entry with the specified timestamp.
     *
     * @param int $timestamp The timestamp of the entry that shall be deleted.
     */
    public function deleteEntry($timestamp, $recipeSite) {
      if($recipeSite == 'AmericanPancake'){
        $file_path = $this->file_path;
        $entry_delimiter = self::ENTRY_DELIMITER;
        $this->examineReviews($recipeSite, function(array &$entries, Entry $entry) use ($timestamp,
                $file_path,
                $entry_delimiter) {
            if ($entry->getTimestamp() === $timestamp) {
                $entry->setDeleted(true);
            }
            \array_push($entries, serialize($entry));
            file_put_contents($file_path, implode($entry_delimiter, $entries) . $entry_delimiter);
        });
      }
      if($recipeSite == 'SwedishPancake'){
        $file_path = $this->file_path2;
        $entry_delimiter = self::ENTRY_DELIMITER;
        $this->examineReviews($recipeSite, function(array &$entries, Entry $entry) use ($timestamp,
                $file_path,
                $entry_delimiter) {
            if ($entry->getTimestamp() === $timestamp) {
                $entry->setDeleted(true);
            }
            \array_push($entries, serialize($entry));
            file_put_contents($file_path, implode($entry_delimiter, $entries) . $entry_delimiter);
        });
      }
    }

    /**
     * @param boolean $removeDeleted If true, the returned array will not include delted entries.
     * @return array The entire conversation as an array of Entry <code>objects</code>. If the
     *                conversation is empty, also the returned array is empty.
     */
     public function getReviews($recipeSite, $removeDeleted) {
         return $this->examineReviews($recipeSite, function(array &$entries, Entry $entry)
                         use ($removeDeleted) {
                     if (!$removeDeleted || !$entry->isDeleted()) {
                         \array_unshift($entries, $entry);
                     }
                 });
     }

     public function findUser($username){
       $this->file_path3 = $_SERVER['DOCUMENT_ROOT'] . Classes::getContextPath() . 'Database/Users.txt';
       $content = file_get_contents($this->file_path3);
       $content = explode(":", $content);

       foreach($content as $values){
          $loginInfo = explode(",", $values);
          $usernameTrial = $loginInfo[0];
          $passwordTrial = $loginInfo[1];
          if($usernameTrial == $username){
            return $foundUser = new User($usernameTrial, $passwordTrial);
          }
         }
         return $InvalidUser = new User('Fel', 'Fel');
       }
}
