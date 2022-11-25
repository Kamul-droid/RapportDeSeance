<?php

namespace App\Entity;

use App\Repository\ProfilOsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfilOsRepository::class)
 */
class ProfilOs
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
     * @ORM\Column(type="string", length=255)
     */
    private $choixBioSpecifique;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reduction;

    /**
     * @ORM\Column(type="text")
     */
    private $nom_os;

    /**
     * @ORM\Column(type="text")
     */
    private $liste_items;

    /**
     * @ORM\ManyToOne(targetEntity=FicheClient::class, inversedBy="os")
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
        return $this->choixBioSpecifique;
    }

    public function setChoixBioSpecifique(string $choixBioSpecifique): self
    {
        $this->choixBioSpecifique = $choixBioSpecifique;

        return $this;
    }

    public function getReduction(): ?string
    {
        return $this->reduction;
    }

    public function setReduction(string $reduction): self
    {
        $this->reduction = $reduction;

        return $this;
    }

    public function getNomOs(): ?string
    {
        return $this->nom_os;
    }

    public function setNomOs(string $nom_os): self
    {
        $this->nom_os = $nom_os;

        return $this;
    }

    public function getListeItems(): ?string
    {
        return $this->liste_items;
    }

    public function setListeItems(string $liste_items): self
    {
        $this->liste_items = $liste_items;

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
