<?php

namespace App\Entity;

class Event
{
    private ?int $id = null;
    private ?string $title = null;
    private ?\DateTimeImmutable $date_start = null;
    private ?\DateTimeImmutable $date_end = null;

    // Constructeur optionnel
    public function __construct(?string $title = null, ?\DateTimeImmutable $date_start = null, ?\DateTimeImmutable $date_end = null)
    {
        $this->title = $title;
        $this->date_start = $date_start;
        $this->date_end = $date_end;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getDateStart(): ?\DateTimeImmutable
    {
        return $this->date_start;
    }

    public function getDateEnd(): ?\DateTimeImmutable
    {
        return $this->date_end;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function setDateStart(?\DateTimeImmutable $date_start): void
    {
        $this->date_start = $date_start;
    }

    public function setDateEnd(?\DateTimeImmutable $date_end): void
    {
        $this->date_end = $date_end;
    }
}
