<?php

namespace App\Entity;

use App\Repository\GlobalStateRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GlobalStateRepository::class)
 */
class GlobalState
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

 

    /**
     * @ORM\Column(type="datetime")
     */
    private $since;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $duration;

    /**
     * @ORM\Column(type="text")
     */
    private $observation;

    /**
     * @ORM\ManyToOne(targetEntity=Quantareport::class, inversedBy="gstate",cascade={"persist"})
     */
    private $quantareport;

    /**
     * @ORM\ManyToOne(targetEntity=GlobalDescription::class, inversedBy="globalStates")
     * @ORM\JoinColumn(nullable=false)
     */
    private $descript;

   

    public function getId(): ?int
    {
        return $this->id;
    }

   

    public function getSince(): ?\DateTimeInterface
    {
        return $this->since;
    }

    public function setSince(\DateTimeInterface $since): self
    {
        $this->since = $since;

        return $this;
    }

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(string $observation): self
    {
        $this->observation = $observation;

        return $this;
    }

    public function getQuantareport(): ?Quantareport
    {
        return $this->quantareport;
    }

    public function setQuantareport(?Quantareport $quantareport): self
    {
        $this->quantareport = $quantareport;

        return $this;
    }

    public function getDescript(): ?GlobalDescription
    {
        return $this->descript;
    }

    public function setDescript(?GlobalDescription $descript): self
    {
        $this->descript = $descript;

        return $this;
    }
}
