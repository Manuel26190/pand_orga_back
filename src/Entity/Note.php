<?php

namespace App\Entity;

class Note
{
    private ?int $id = null;
    private ?string $content = null;    

    // Getter pour l'ID
    public function getId(): ?int
    {
        return $this->id;
    }

    // Setter pour l'ID (si vous avez besoin de le modifier)
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    // Getter pour le contenu
    public function getContent(): ?string
    {
        return $this->content;
    }

    // Setter pour le contenu
    public function setContent(?string $content): void
    {
        $this->content = $content;
    }
}
