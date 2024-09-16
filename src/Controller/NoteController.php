<?php

namespace App\Controller;
use App\Entity\Note;
use App\Repository\NoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

// Route globale
#[Route('api')]

class NoteController extends AbstractController{

    public function __construct(private NoteRepository $repo) {
        
    }

    // Route pour voir la liste des notes
    #[Route('/notes', methods: ['GET'])]
    public function findAllNotes() {
        return $this->json($this->repo->findAllNotes());
    }

    // Route pour ajouter une nouvelle note
    #[Route('/add_note', methods: ['POST'])]
    public function addNote(Request $request, SerializerInterface $serializer)
    {
        // Récupérer le contenu de la requête
        $data = $request->getContent();
        
        // Désérialiser les données JSON dans une instance de l'entité Note
        $note = $serializer->deserialize($data, Note::class, 'json');

        // Persister l'entité Note via le repository
        $this->repo->persistNote($note);

        return $this->json($note);
    }

   }




