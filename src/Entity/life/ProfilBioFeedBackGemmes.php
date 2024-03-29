<?php

namespace App\Entity\life;

use App\Entity\FicheClient;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProfilBioFeedBackGemmesRepository;

/**
 * @ORM\Entity(repositoryClass=ProfilBioFeedBackGemmesRepository::class)
 */
class ProfilBioFeedBackGemmes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=FicheClient::class, inversedBy="biofeedback")
     */
    private $ficheClient;

    public function getId(): ?int
    {
        return $this->id;
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
