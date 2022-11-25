<?php

namespace App\Entity;

use App\Repository\ProfilTransformationEmtionnelleEtChronologiqueRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfilTransformationEmtionnelleEtChronologiqueRepository::class)
 */
class ProfilTransformationEmtionnelleEtChronologique
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
    private $choix_de_voies;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $facteurs_de_stress_emotionnel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $facteurs_de_stress_conflictuel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $choix_de_feedback;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $choix_solution;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $facteurs_de_stress_relationnel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $chronologie_de_facteurs;

    /**
     * @ORM\ManyToOne(targetEntity=FicheClient::class, inversedBy="transformation_emtionnelle")
     */
    private $ficheClient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChoixDeVoies(): ?string
    {
        return $this->choix_de_voies;
    }

    public function setChoixDeVoies(string $choix_de_voies): self
    {
        $this->choix_de_voies = $choix_de_voies;

        return $this;
    }

    public function getFacteursDeStressEmotionnel(): ?string
    {
        return $this->facteurs_de_stress_emotionnel;
    }

    public function setFacteursDeStressEmotionnel(string $facteurs_de_stress_emotionnel): self
    {
        $this->facteurs_de_stress_emotionnel = $facteurs_de_stress_emotionnel;

        return $this;
    }

    public function getFacteursDeStressConflictuel(): ?string
    {
        return $this->facteurs_de_stress_conflictuel;
    }

    public function setFacteursDeStressConflictuel(string $facteurs_de_stress_conflictuel): self
    {
        $this->facteurs_de_stress_conflictuel = $facteurs_de_stress_conflictuel;

        return $this;
    }

    public function getChoixDeFeedback(): ?string
    {
        return $this->choix_de_feedback;
    }

    public function setChoixDeFeedback(string $choix_de_feedback): self
    {
        $this->choix_de_feedback = $choix_de_feedback;

        return $this;
    }

    public function getChoixSolution(): ?string
    {
        return $this->choix_solution;
    }

    public function setChoixSolution(string $choix_solution): self
    {
        $this->choix_solution = $choix_solution;

        return $this;
    }

    public function getFacteursDeStressRelationnel(): ?string
    {
        return $this->facteurs_de_stress_relationnel;
    }

    public function setFacteursDeStressRelationnel(string $facteurs_de_stress_relationnel): self
    {
        $this->facteurs_de_stress_relationnel = $facteurs_de_stress_relationnel;

        return $this;
    }

    public function getChronologieDeFacteurs(): ?string
    {
        return $this->chronologie_de_facteurs;
    }

    public function setChronologieDeFacteurs(string $chronologie_de_facteurs): self
    {
        $this->chronologie_de_facteurs = $chronologie_de_facteurs;

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
