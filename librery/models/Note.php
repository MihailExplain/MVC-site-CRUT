<?php


namespace models;

use mysqli;

class Note
{
    protected $_db;

    public function __construct()
    {
        $this->_db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if($this->_db->connect_error !=0){
            die($this->_db->connect_error);//TODO exception
        }
    }

    /**
     * get DB notes
     * @return array
     */
    public function all(){
        $query = "SELECT * FROM notes;";
        $result = $this->_db->query($query);
        if(!$result){
            die($this->_db->error);//TODO exception
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * save in DB new note
     * @param $note
     */
    public function add($note){
        $note = $this->_db->real_escape_string($note);
        $query = "INSERT INTO notes values (null, '$note');";
        if(!$this->_db->query($query)){
            die($this->_db->error);//TODO exception
        }
    }

    /**
     * delete from DB on id
     * @param $noteId
     */
    public function noteDel($noteId){
        $sql = "DELETE FROM notes WHERE id = '$noteId';";
        if(!$this->_db->query($sql)){
            die($this->_db->error);//TODO exception
        }
    }

    /**
     * update DB`s field on id
     * @param $noteId
     * @param $note
     */
    public function changeNote($noteId, $note){
        $note = $this->_db->real_escape_string($note);
        $sql = "UPDATE notes SET text = '$note' WHERE notes.id = '$noteId';";
        if(!$this->_db->query($sql)){
            die($this->_db->error);//TODO exception
        }
    }
}