<?php

namespace App\Entity;

use App\Repository\ProfilNutritionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfilNutritionRepository::class)
 */
class ProfilNutrition
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
    private $mineraux;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $acides_amines;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $vitamines;

    /**
     * @ORM\ManyToOne(targetEntity=FicheClient::class, inversedBy="nutrition")
     */
    private $ficheClient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMineraux(): ?string
    {
        return $this->mineraux;
    }

    public function setMineraux(string $mineraux): self
    {
        $this->mineraux = $mineraux;

        return $this;
    }

    public function getAcidesAmines(): ?string
    {
        return $this->acides_amines;
    }

    public function setAcidesAmines(string $acides_amines): self
    {
        $this->acides_amines = $acides_amines;

        return $this;
    }

    public function getVitamines(): ?string
    {
        return $this->vitamines;
    }

    public function setVitamines(string $vitamines): self
    {
        $this->vitamines = $vitamines;

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
