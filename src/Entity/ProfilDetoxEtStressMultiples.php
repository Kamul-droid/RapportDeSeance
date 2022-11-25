<?php

namespace App\Entity;

use App\Repository\ProfilDetoxEtStressMultiplesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfilDetoxEtStressMultiplesRepository::class)
 */
class ProfilDetoxEtStressMultiples
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
    private $toxines_environnementales_et_industrielles;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pathogenes_et_autres_substances_toxiques;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $facteurs_de_stress_personnel_et_auto_induit;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $detox_du_corps;

    /**
     * @ORM\ManyToOne(targetEntity=FicheClient::class, inversedBy="detox_stress")
     */
    private $ficheClient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getToxinesEnvironnementalesEtIndustrielles(): ?string
    {
        return $this->toxines_environnementales_et_industrielles;
    }

    public function setToxinesEnvironnementalesEtIndustrielles(string $toxines_environnementales_et_industrielles): self
    {
        $this->toxines_environnementales_et_industrielles = $toxines_environnementales_et_industrielles;

        return $this;
    }

    public function getPathogenesEtAutresSubstancesToxiques(): ?string
    {
        return $this->pathogenes_et_autres_substances_toxiques;
    }

    public function setPathogenesEtAutresSubstancesToxiques(string $pathogenes_et_autres_substances_toxiques): self
    {
        $this->pathogenes_et_autres_substances_toxiques = $pathogenes_et_autres_substances_toxiques;

        return $this;
    }

    public function getFacteursDeStressPersonnelEtAutoInduit(): ?string
    {
        return $this->facteurs_de_stress_personnel_et_auto_induit;
    }

    public function setFacteursDeStressPersonnelEtAutoInduit(string $facteurs_de_stress_personnel_et_auto_induit): self
    {
        $this->facteurs_de_stress_personnel_et_auto_induit = $facteurs_de_stress_personnel_et_auto_induit;

        return $this;
    }

    public function getDetoxDuCorps(): ?string
    {
        return $this->detox_du_corps;
    }

    public function setDetoxDuCorps(string $detox_du_corps): self
    {
        $this->detox_du_corps = $detox_du_corps;

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
