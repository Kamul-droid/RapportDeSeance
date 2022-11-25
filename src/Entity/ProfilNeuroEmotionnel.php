<?php

namespace App\Entity;

use App\Repository\ProfilNeuroEmotionnelRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfilNeuroEmotionnelRepository::class)
 */
class ProfilNeuroEmotionnel
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
    private $conseil_evaluation_pour_auto_evaluation;

    /**
     * @ORM\ManyToOne(targetEntity=FicheClient::class, inversedBy="neur_emotionnel")
     */
    private $ficheClient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConseilEvaluationPourAutoEvaluation(): ?string
    {
        return $this->conseil_evaluation_pour_auto_evaluation;
    }

    public function setConseilEvaluationPourAutoEvaluation(string $conseil_evaluation_pour_auto_evaluation): self
    {
        $this->conseil_evaluation_pour_auto_evaluation = $conseil_evaluation_pour_auto_evaluation;

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
