<?php

namespace App\Entity\life;

use App\Repository\ProfilNerfsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfilNerfsRepository::class)
 */
class ProfilNerfs
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
    private $transfert;

    /**
     * @ORM\Column(type="text")
     */
    private $choix_bio_specifique;

    /**
     * @ORM\Column(type="text")
     */
    private $choix_items;

    /**
     * @ORM\ManyToOne(targetEntity=FicheClient::class, inversedBy="nerfs")
     */
    private $ficheClient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTransfert(): ?string
    {
        return $this->transfert;
    }

    public function setTransfert(string $transfert): self
    {
        $this->transfert = $transfert;

        return $this;
    }

    public function getChoixBioSpecifique(): ?string
    {
        return $this->choix_bio_specifique;
    }

    public function setChoixBioSpecifique(string $choix_bio_specifique): self
    {
        $this->choix_bio_specifique = $choix_bio_specifique;

        return $this;
    }

    public function getChoixItems(): ?string
    {
        return $this->choix_items;
    }

    public function setChoixItems(string $choix_items): self
    {
        $this->choix_items = $choix_items;

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