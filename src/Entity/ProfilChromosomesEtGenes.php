<?php

namespace App\Entity;

use App\Repository\ProfilChromosomesEtGenesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfilChromosomesEtGenesRepository::class)
 */
class ProfilChromosomesEtGenes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $evaluation_des_chromosomes;

    /**
     * @ORM\Column(type="text")
     */
    private $evaluation_des_genes;

    /**
     * @ORM\Column(type="text")
     */
    private $auto_feedback_pour_celle_Comm;

    /**
     * @ORM\ManyToOne(targetEntity=FicheClient::class, inversedBy="chromosomes")
     */
    private $ficheClient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEvaluationDesChromosomes(): ?string
    {
        return $this->evaluation_des_chromosomes;
    }

    public function setEvaluationDesChromosomes(string $evaluation_des_chromosomes): self
    {
        $this->evaluation_des_chromosomes = $evaluation_des_chromosomes;

        return $this;
    }

    public function getEvaluationDesGenes(): ?string
    {
        return $this->evaluation_des_genes;
    }

    public function setEvaluationDesGenes(string $evaluation_des_genes): self
    {
        $this->evaluation_des_genes = $evaluation_des_genes;

        return $this;
    }

    public function getAutoFeedbackPourCelleComm(): ?string
    {
        return $this->auto_feedback_pour_celle_Comm;
    }

    public function setAutoFeedbackPourCelleComm(string $auto_feedback_pour_celle_Comm): self
    {
        $this->auto_feedback_pour_celle_Comm = $auto_feedback_pour_celle_Comm;

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
