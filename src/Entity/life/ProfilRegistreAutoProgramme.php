<?php

namespace App\Entity\life;

use App\Repository\ProfilRegistreAutoProgrammeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfilRegistreAutoProgrammeRepository::class)
 */
class ProfilRegistreAutoProgramme
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
    private $registre_susceptibilite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $transfert;

    /**
     * @ORM\ManyToOne(targetEntity=FicheClient::class, inversedBy="registre_auto_programme")
     */
    private $ficheClient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRegistreSusceptibilite(): ?string
    {
        return $this->registre_susceptibilite;
    }

    public function setRegistreSusceptibilite(string $registre_susceptibilite): self
    {
        $this->registre_susceptibilite = $registre_susceptibilite;

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
