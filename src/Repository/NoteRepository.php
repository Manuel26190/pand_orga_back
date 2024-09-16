<?php

namespace App\Repository;

use App\Entity\Note;
use PDO;

class NoteRepository{

    private PDO $connexion;

    public function __construct(){
        $this->connexion = new PDO(
            'mysql:host='.$_ENV['DATABASE_HOST'].';dbname='.$_ENV['DATABASE_NAME'].';port='.$_ENV['DATABASE_PORT'],
        $_ENV['DATABASE_USER'],
        $_ENV['DATABASE_PASSWORD'] 
        );
    }

    //Méthode pour afficher la liste des notes
    public function findAllNotes(){
        $query = $this->connexion->prepare('SELECT * FROM notes');
        $query->execute();
        $notes = $query->fetchAll(PDO::FETCH_CLASS, Note::class);
        return $notes;
    }

   // méthode pour ajouter une nouvelle note
    public function persistNote(Note $note){
        $query = $this->connexion->prepare('INSERT INTO notes (content) VALUES (:content)');
        $query->execute([
            'content' => $note->getContent()
        ]);
    }





}