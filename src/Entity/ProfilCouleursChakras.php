<?php

namespace App\Entity;

use App\Repository\ProfilCouleursChakrasRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfilCouleursChakrasRepository::class)
 */
class ProfilCouleursChakras
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
    private $chakra;

    /**
     * @ORM\ManyToOne(targetEntity=FicheClient::class, inversedBy="couleurs_chakras")
     */
    private $ficheClient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChakra(): ?string
    {
        return $this->chakra;
    }

    public function setChakra(string $chakra): self
    {
        $this->chakra = $chakra;

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
