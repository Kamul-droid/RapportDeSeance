<?php

namespace App\Entity\life;

use App\Repository\ProfilHormonalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfilHormonalRepository::class)
 */
class ProfilHormonal
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
    private $balance_hormonale_femelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $balance_hormonale_male;

    /**
     * @ORM\Column(type="text")
     */
    private $glandes_hormones;

    /**
     * @ORM\Column(type="text")
     */
    private $commentaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBalanceHormonaleFemelle(): ?string
    {
        return $this->balance_hormonale_femelle;
    }

    public function setBalanceHormonaleFemelle(string $balance_hormonale_femelle): self
    {
        $this->balance_hormonale_femelle = $balance_hormonale_femelle;

        return $this;
    }

    public function getBalanceHormonaleMale(): ?string
    {
        return $this->balance_hormonale_male;
    }

    public function setBalanceHormonaleMale(string $balance_hormonale_male): self
    {
        $this->balance_hormonale_male = $balance_hormonale_male;

        return $this;
    }

    public function getGlandesHormones(): ?string
    {
        return $this->glandes_hormones;
    }

    public function setGlandesHormones(string $glandes_hormones): self
    {
        $this->glandes_hormones = $glandes_hormones;

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
}
