<?php


namespace controllers;

use models\Note;
use View;
use Route;
class Index extends AbstractController
{
    /**
     * chose page index and take array from DB
     */
    public function index()
    {
        //all entities
        $note = new Note();
        $notes = $note->all();
        $view = new View('index_index');
        $view->render(['notes'=>$notes]);
    }

    /**
     * chose create page
     */
    public function create(){
        $view = new View('index_create');
        $view->render();
    }

    /**
     * chose method for add or update in DB
     */
    public function update(){
        $noteText = $_REQUEST['note'];
        $note = new Note();
        $note->add($noteText);
        Route::redirect();
    }
    public function edit(){
        $noteText = $_REQUEST['note'];
        $noteId = $_REQUEST['id'];
        $note = new Note();
        $note->changeNote($noteId, $noteText);
        Route::redirect();
    }
    /**
     * delete from DB
     */
    public function delete(){
        $noteId = $_REQUEST['id'];
        $note = new Note();
        $note->noteDel($noteId);
        Route::redirect();
    }

    /**
     * chose page for update
     */
    public function change(){
        $view = new View('index_change');
        $view->render();
    }
}