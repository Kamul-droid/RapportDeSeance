<?php

namespace App\Entity;

use App\Repository\GlobalDescriptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GlobalDescriptionRepository::class)
 */
class GlobalDescription
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
     * @ORM\OneToMany(targetEntity=GlobalState::class, mappedBy="descript", orphanRemoval=true)
     */
    private $globalStates;

    public function __construct()
    {
        $this->globalStates = new ArrayCollection();
    }

    

   

   

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

    /**
     * @return Collection<int, GlobalState>
     */
    public function getGlobalStates(): Collection
    {
        return $this->globalStates;
    }

    public function addGlobalState(GlobalState $globalState): self
    {
        if (!$this->globalStates->contains($globalState)) {
            $this->globalStates[] = $globalState;
            $globalState->setDescript($this);
        }

        return $this;
    }

    public function removeGlobalState(GlobalState $globalState): self
    {
        if ($this->globalStates->removeElement($globalState)) {
            // set the owning side to null (unless already changed)
            if ($globalState->getDescript() === $this) {
                $globalState->setDescript(null);
            }
        }

        return $this;
    }

    
   
}
