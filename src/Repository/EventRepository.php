<?php

namespace App\Repository;

use App\Entity\Event; 
use PDO;

class EventRepository{

    private PDO $connexion;

    public function __construct(){
        $this->connexion = new PDO(
            'mysql:host='.$_ENV['DATABASE_HOST'].';dbname='.$_ENV['DATABASE_NAME'].';port='.$_ENV['DATABASE_PORT'],
        $_ENV['DATABASE_USER'],
        $_ENV['DATABASE_PASSWORD'] 
        );
    }

    //Méthode pour afficher la liste des Events
    public function findAllEvents(){
        $query = $this->connexion->prepare('SELECT * FROM events');
        $query->execute();
        $events = $query->fetchAll(PDO::FETCH_CLASS, Event::class);
        return $events;
    }

    //Méthode pour ajouter une nouvelle Event
    public function persistEvent(Event $event){
        $query = $this->connexion->prepare('INSERT INTO events (title, date_start, date_end) VALUES (:title, :date_start, :date_end)');
        $query->execute([
            'title' => $event->getTitle(),            
            'date_start' => $event->getDateStart()->format('Y-m-d H:i:s'),
            'date_end' => $event->getDateEnd()->format('Y-m-d H:i:s')
        ]);
    }






}

