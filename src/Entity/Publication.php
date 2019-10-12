<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PublicationRepository")
 */
class Publication
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $publicationDateStart;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPublicationDateStart(): ?\DateTimeInterface
    {
        return $this->publicationDateStart;
    }

    public function setPublicationDateStart(\DateTimeInterface $publicationDateStart): self
    {
        $this->publicationDateStart = $publicationDateStart;

        return $this;
    }
}
