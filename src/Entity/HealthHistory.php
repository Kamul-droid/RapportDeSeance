<?php

namespace App\Entity;

use App\Repository\HealthHistoryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HealthHistoryRepository::class)
 */
class HealthHistory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $descript;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $illness;

    /**
     * @ORM\Column(type="date")
     */
    private $event;

    /**
     * @ORM\ManyToOne(targetEntity=Quantareport::class, inversedBy="health", cascade={"persist"})
     */
    private $quantareport;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescript(): ?string
    {
        return $this->descript;
    }

    public function setDescript(string $descript): self
    {
        $this->descript = $descript;

        return $this;
    }

    public function getIllness(): ?string
    {
        return $this->illness;
    }

    public function setIllness(string $illness): self
    {
        $this->illness = $illness;

        return $this;
    }

    public function getEvent(): ?\DateTimeInterface
    {
        return $this->event;
    }

    public function setEvent(\DateTimeInterface $event): self
    {
        $this->event = $event;

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
}
