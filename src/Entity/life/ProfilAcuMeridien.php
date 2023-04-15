<?php

namespace App\Entity\life;

use App\Entity\FicheClient;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProfilAcuMeridienRepository;

/**
 * @ORM\Entity(repositoryClass=ProfilAcuMeridienRepository::class)
 */
class ProfilAcuMeridien
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $meridien;

    /**
     * @ORM\Column(type="text")
     */
    private $feedback;

    /**
     * @ORM\Column(type="text")
     */
    private $commentaire;

    /**
     * @ORM\ManyToOne(targetEntity=FicheClient::class, inversedBy="acupuncture")
     */
    private $ficheClient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMeridien(): ?string
    {
        return $this->meridien;
    }

    public function setMeridien(string $meridien): self
    {
        $this->meridien = $meridien;

        return $this;
    }

    public function getFeedback(): ?string
    {
        return $this->feedback;
    }

    public function setFeedback(string $feedback): self
    {
        $this->feedback = $feedback;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getFicheClient(): ?FicheClient
    {
        return $this->ficheClient;
    }

    public function setFicheClient(?FicheClient $ficheClient): self
    {
        $this->ficheClient = $ficheClient;

        return $this;
    }
}
