<?php

namespace App\Entity\life;

use App\Entity\FicheClient;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProfilAllergieRepository;

/**
 * @ORM\Entity(repositoryClass=ProfilAllergieRepository::class)
 */
class ProfilAllergie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $commentaire;

    /**
     * @ORM\Column(type="text")
     */
    private $nom_item;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $feedbacksupplementaire;

    /**
     * @ORM\ManyToOne(targetEntity=FicheClient::class, inversedBy="allergie")
     */
    private $ficheClient;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNomItem(): ?string
    {
        return $this->nom_item;
    }

    public function setNomItem(string $nom_item): self
    {
        $this->nom_item = $nom_item;

        return $this;
    }

    public function getFeedbacksupplementaire(): ?string
    {
        return $this->feedbacksupplementaire;
    }

    public function setFeedbacksupplementaire(string $feedbacksupplementaire): self
    {
        $this->feedbacksupplementaire = $feedbacksupplementaire;

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
