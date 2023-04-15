<?php

namespace App\Entity\life;

use App\Entity\FicheClient;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProfilCellComRepository;

/**
 * @ORM\Entity(repositoryClass=ProfilCellComRepository::class)
 */
class ProfilCellCom
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
    private $auto_feedback_pour_cell_comm;

    /**
     * @ORM\ManyToOne(targetEntity=FicheClient::class, inversedBy="cell_com")
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

    public function getAutoFeedbackPourCellComm(): ?string
    {
        return $this->auto_feedback_pour_cell_comm;
    }

    public function setAutoFeedbackPourCellComm(string $auto_feedback_pour_cell_comm): self
    {
        $this->auto_feedback_pour_cell_comm = $auto_feedback_pour_cell_comm;

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
