<?php

namespace App\Controller;

use App\Entity\Event;
use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;


// Route globale
#[Route('/api')]     

class EventController extends AbstractController{

    public function __construct(private EventRepository $repo) {
        
    }

    // Route pour voir la liste des Events
    #[Route('/events', methods: ['GET'])]
    public function findAllEvents() {
        return $this->json($this->repo->findAllEvents());
    }

    // Route pour ajouter une nouvelle Event
    #[Route('/add_event', methods: ['POST'])]
    public function addEvent(Request $request, SerializerInterface $serializer)
    {
        // Récupérer le contenu de la requête
        $data = $request->getContent();
        
        // Désérialiser les données JSON dans une instance de l'entité Event
        $event = $serializer->deserialize($data, Event::class, 'json');

        // Persister l'entité Event via le repository
        $this->repo->persistEvent($event);

        return $this->json($event);
    }
}