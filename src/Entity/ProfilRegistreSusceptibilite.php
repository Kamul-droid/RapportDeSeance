<?php

namespace App\Entity;

use App\Repository\RegistreSusceptibiliteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RegistreSusceptibiliteRepository::class)
 */
class ProfilRegistreSusceptibilite
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $registre_de_susceptibilite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $transfert;

    /**
     * @ORM\ManyToOne(targetEntity=FicheClient::class, inversedBy="susceptibilite")
     */
    private $ficheClient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getRegistreDeSusceptibilite(): ?string
    {
        return $this->registre_de_susceptibilite;
    }

    public function setRegistreDeSusceptibilite(string $registre_de_susceptibilite): self
    {
        $this->registre_de_susceptibilite = $registre_de_susceptibilite;

        return $this;
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
