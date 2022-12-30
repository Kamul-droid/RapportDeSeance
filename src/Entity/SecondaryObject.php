<?php

namespace App\Entity;

use App\Repository\SecondaryObjectRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SecondaryObjectRepository::class)
 */
class SecondaryObject
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
    private $subject;

    /**
     * @ORM\ManyToOne(targetEntity=Quantareport::class, inversedBy="sobject")
     */
    private $quantareport;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

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
