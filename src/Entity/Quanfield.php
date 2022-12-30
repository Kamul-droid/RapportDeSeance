<?php

namespace App\Entity;

use App\Repository\QuanfieldRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuanfieldRepository::class)
 */
class Quanfield
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=QuanData::class, mappedBy="quanfield")
     */
    private $data;

    /**
     * @ORM\ManyToOne(targetEntity=Quantareport::class, inversedBy="qdata")
     */
    private $quantareport;

    public function __construct()
    {
        $this->data = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, QuanData>
     */
    public function getData(): Collection
    {
        return $this->data;
    }

    public function addData(QuanData $data): self
    {
        if (!$this->data->contains($data)) {
            $this->data[] = $data;
            $data->setQuanfield($this);
        }

        return $this;
    }

    public function removeData(QuanData $data): self
    {
        if ($this->data->removeElement($data)) {
            // set the owning side to null (unless already changed)
            if ($data->getQuanfield() === $this) {
                $data->setQuanfield(null);
            }
        }

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
