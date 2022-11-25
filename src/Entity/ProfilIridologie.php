<?php

namespace App\Entity;

use App\Repository\ProfilIridologieRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfilIridologieRepository::class)
 */
class ProfilIridologie
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
    private $table_a_langer;

    /**
     * @ORM\Column(type="text")
     */
    private $commentaire;

    /**
     * @ORM\Column(type="text")
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity=FicheClient::class, inversedBy="iridologie")
     */
    private $ficheClient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTableALanger(): ?string
    {
        return $this->table_a_langer;
    }

    public function setTableALanger(string $table_a_langer): self
    {
        $this->table_a_langer = $table_a_langer;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

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
