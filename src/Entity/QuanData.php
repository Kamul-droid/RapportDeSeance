<?php

namespace App\Entity;

use App\Repository\QuanDataRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuanDataRepository::class)
 */
class QuanData
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
    private $picto;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $disease;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $microBact;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $emotionConflit;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $incDec;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vgt;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $observation;

    /**
     * @ORM\ManyToOne(targetEntity=Quanfield::class, inversedBy="data")
     */
    private $quanfield;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $med;

    /**
     * @ORM\ManyToOne(targetEntity=Quantareport::class, inversedBy="qdata",cascade={"persist"})
     */
    private $quantareport;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPicto(): ?string
    {
        return $this->picto;
    }

    public function setPicto(string $picto): self
    {
        $this->picto = $picto;

        return $this;
    }

    public function getDisease(): ?string
    {
        return $this->disease;
    }

    public function setDisease(string $disease): self
    {
        $this->disease = $disease;

        return $this;
    }

    public function getMicroBact(): ?string
    {
        return $this->microBact;
    }

    public function setMicroBact(?string $microBact): self
    {
        $this->microBact = $microBact;

        return $this;
    }

    public function getEmotionConflit(): ?string
    {
        return $this->emotionConflit;
    }

    public function setEmotionConflit(?string $emotionConflit): self
    {
        $this->emotionConflit = $emotionConflit;

        return $this;
    }

    public function getMt(): ?string
    {
        return $this->mt;
    }

    public function setMt(?string $mt): self
    {
        $this->mt = $mt;

        return $this;
    }

    public function getIncDec(): ?string
    {
        return $this->incDec;
    }

    public function setIncDec(?string $incDec): self
    {
        $this->incDec = $incDec;

        return $this;
    }

    public function getVgt(): ?string
    {
        return $this->vgt;
    }

    public function setVgt(?string $vgt): self
    {
        $this->vgt = $vgt;

        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(?string $observation): self
    {
        $this->observation = $observation;

        return $this;
    }

    public function getQuanfield(): ?Quanfield
    {
        return $this->quanfield;
    }

    public function setQuanfield(?Quanfield $quanfield): self
    {
        $this->quanfield = $quanfield;

        return $this;
    }

    public function getMed(): ?string
    {
        return $this->med;
    }

    public function setMed(string $med): self
    {
        $this->med = $med;

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
