<?php

namespace App\Entity;

use App\Repository\ProfilHomeopathiqueRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfilHomeopathiqueRepository::class)
 */
class ProfilHomeopathique
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
    private $generateur_homeopathique;

    /**
     * @ORM\Column(type="text")
     */
    private $commentaire;

    /**
     * @ORM\ManyToOne(targetEntity=FicheClient::class, inversedBy="homeopathique")
     */
    private $ficheClient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGenerateurHomeopathique(): ?string
    {
        return $this->generateur_homeopathique;
    }

    public function setGenerateurHomeopathique(string $generateur_homeopathique): self
    {
        $this->generateur_homeopathique = $generateur_homeopathique;

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
