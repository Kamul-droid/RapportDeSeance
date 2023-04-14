<?php

namespace App\Entity\life;

use App\Repository\ProfilCirculationCoeurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfilCirculationCoeurRepository::class)
 */
class ProfilCirculationCoeur
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
    private $valves_arteres;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $choix_biospecifique;

    /**
     * @ORM\Column(type="text")
     */
    private $choix_item;

    /**
     * @ORM\ManyToOne(targetEntity=FicheClient::class, inversedBy="circulation_coeur")
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

    public function getValvesArteres(): ?string
    {
        return $this->valves_arteres;
    }

    public function setValvesArteres(string $valves_arteres): self
    {
        $this->valves_arteres = $valves_arteres;

        return $this;
    }

    public function getChoixBiospecifique(): ?string
    {
        return $this->choix_biospecifique;
    }

    public function setChoixBiospecifique(string $choix_biospecifique): self
    {
        $this->choix_biospecifique = $choix_biospecifique;

        return $this;
    }

    public function getChoixItem(): ?string
    {
        return $this->choix_item;
    }

    public function setChoixItem(string $choix_item): self
    {
        $this->choix_item = $choix_item;

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
