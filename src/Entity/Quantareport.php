<?php

namespace App\Entity;

use App\Repository\QuantareportRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuantareportRepository::class)
 */
class Quantareport
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $consult_method;

    /**
     * @ORM\Column(type="datetime")
     */
    private $started_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $ended_at;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $soundplay;

    /**
     * @ORM\OneToMany(targetEntity=PrimaryObject::class, mappedBy="quantareport", cascade={"persist"})
     */
    private $pobject;

    /**
     * @ORM\OneToMany(targetEntity=SecondaryObject::class, mappedBy="quantareport", cascade={"persist"})
     */
    private $sobject;

    /**
     * @ORM\OneToMany(targetEntity=GlobalState::class, mappedBy="quantareport", cascade={"persist"})
     */
    private $gstate;

    /**
     * @ORM\OneToMany(targetEntity=HealthHistory::class, mappedBy="quantareport",cascade={"persist"})
     */
    private $health;

  

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment;

    /**
     * @ORM\Column(type="datetime")
     */
    private $rdate;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="report")
     */
    private $client;

    /**
     * @ORM\OneToMany(targetEntity=QuanData::class, mappedBy="quantareport", cascade={"persist"})
     */
    private $qdata;

    public function __construct()
    {
        $this->pobject = new ArrayCollection();
        $this->sobject = new ArrayCollection();
        $this->gstate = new ArrayCollection();
        $this->health = new ArrayCollection();
        $this->qdata = new ArrayCollection();
        
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConsultMethod(): ?string
    {
        return $this->consult_method;
    }

    public function setConsultMethod(string $consult_method): self
    {
        $this->consult_method = $consult_method;

        return $this;
    }

    public function getStartedAt(): ?\DateTime
    {
        return $this->started_at;
    }

    public function setStartedAt(\DateTime $started_at): self
    {
        $this->started_at = $started_at;

        return $this;
    }

    public function getEndedAt(): ?\DateTime
    {
        return $this->ended_at;
    }

    public function setEndedAt(\DateTime $ended_at): self
    {
        $this->ended_at = $ended_at;

        return $this;
    }

    public function getSoundplay(): ?string
    {
        return $this->soundplay;
    }

    public function setSoundplay(string $soundplay): self
    {
        $this->soundplay = $soundplay;

        return $this;
    }

    /**
     * @return Collection<int, PrimaryObject>
     */
    public function getPobject(): Collection
    {
        return $this->pobject;
    }

    public function addPobject(PrimaryObject $pobject): self
    {
        if (!$this->pobject->contains($pobject)) {
            $this->pobject[] = $pobject;
            $pobject->setQuantareport($this);
        }

        return $this;
    }

    public function removePobject(PrimaryObject $pobject): self
    {
        if ($this->pobject->removeElement($pobject)) {
            // set the owning side to null (unless already changed)
            if ($pobject->getQuantareport() === $this) {
                $pobject->setQuantareport(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SecondaryObject>
     */
    public function getSobject(): Collection
    {
        return $this->sobject;
    }

    public function addSobject(SecondaryObject $sobject): self
    {
        if (!$this->sobject->contains($sobject)) {
            $this->sobject[] = $sobject;
            $sobject->setQuantareport($this);
        }

        return $this;
    }

    public function removeSobject(SecondaryObject $sobject): self
    {
        if ($this->sobject->removeElement($sobject)) {
            // set the owning side to null (unless already changed)
            if ($sobject->getQuantareport() === $this) {
                $sobject->setQuantareport(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, GlobalState>
     */
    public function getGstate(): Collection
    {
        return $this->gstate;
    }

    public function addGstate(GlobalState $gstate): self
    {
        if (!$this->gstate->contains($gstate)) {
            $this->gstate[] = $gstate;
            $gstate->setQuantareport($this);
        }

        return $this;
    }

    public function removeGstate(GlobalState $gstate): self
    {
        if ($this->gstate->removeElement($gstate)) {
            // set the owning side to null (unless already changed)
            if ($gstate->getQuantareport() === $this) {
                $gstate->setQuantareport(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, HealthHistory>
     */
    public function getHealth(): Collection
    {
        return $this->health;
    }

    public function addHealth(HealthHistory $health): self
    {
        if (!$this->health->contains($health)) {
            $this->health[] = $health;
            $health->setQuantareport($this);
        }

        return $this;
    }

    public function removeHealth(HealthHistory $health): self
    {
        if ($this->health->removeElement($health)) {
            // set the owning side to null (unless already changed)
            if ($health->getQuantareport() === $this) {
                $health->setQuantareport(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, QuanData>
     */
    public function getQdata(): Collection
    {
        return $this->qdata;
    }

   


    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getRdate(): ?\DateTimeInterface
    {
        return $this->rdate;
    }

    public function setRdate(\DateTimeInterface $rdate): self
    {
        $this->rdate = $rdate;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function addQdatum(QuanData $qdatum): self
    {
        if (!$this->qdata->contains($qdatum)) {
            $this->qdata[] = $qdatum;
            $qdatum->setQuantareport($this);
        }

        return $this;
    }

    public function removeQdatum(QuanData $qdatum): self
    {
        if ($this->qdata->removeElement($qdatum)) {
            // set the owning side to null (unless already changed)
            if ($qdatum->getQuantareport() === $this) {
                $qdatum->setQuantareport(null);
            }
        }

        return $this;
    }
}
