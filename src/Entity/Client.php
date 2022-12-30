<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
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
     * @ORM\Column(type="string", length=255)
     */
    private $surname;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateofbirth;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $placeofbirth;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $s_group;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $hand;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $work;

    /**
     * @ORM\Column(type="string", length=70)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $postalcode;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $sex;

    /**
     * @ORM\Column(type="integer")
     */
    private $children;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $children_sex;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $maried;

    /**
     * @ORM\OneToMany(targetEntity=Quantareport::class, mappedBy="client")
     */
    private $report;

    public function __construct()
    {
        $this->report = new ArrayCollection();
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

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getDateofbirth(): ?\DateTimeInterface
    {
        return $this->dateofbirth;
    }

    public function setDateofbirth(\DateTimeInterface $dateofbirth): self
    {
        $this->dateofbirth = $dateofbirth;

        return $this;
    }

    public function getPlaceofbirth(): ?string
    {
        return $this->placeofbirth;
    }

    public function setPlaceofbirth(string $placeofbirth): self
    {
        $this->placeofbirth = $placeofbirth;

        return $this;
    }

    public function getSGroup(): ?string
    {
        return $this->s_group;
    }

    public function setSGroup(string $s_group): self
    {
        $this->s_group = $s_group;

        return $this;
    }

    public function getHand(): ?string
    {
        return $this->hand;
    }

    public function setHand(string $hand): self
    {
        $this->hand = $hand;

        return $this;
    }

    public function getWork(): ?string
    {
        return $this->work;
    }

    public function setWork(string $work): self
    {
        $this->work = $work;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPostalcode(): ?string
    {
        return $this->postalcode;
    }

    public function setPostalcode(string $postalcode): self
    {
        $this->postalcode = $postalcode;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function setSex(string $sex): self
    {
        $this->sex = $sex;

        return $this;
    }

    public function getChildren(): ?int
    {
        return $this->children;
    }

    public function setChildren(int $children): self
    {
        $this->children = $children;

        return $this;
    }

    public function getChildrenSex(): ?string
    {
        return $this->children_sex;
    }

    public function setChildrenSex(string $children_sex): self
    {
        $this->children_sex = $children_sex;

        return $this;
    }

    public function getMaried(): ?string
    {
        return $this->maried;
    }

    public function setMaried(string $maried): self
    {
        $this->maried = $maried;

        return $this;
    }

    /**
     * @return Collection<int, Quantareport>
     */
    public function getReport(): Collection
    {
        return $this->report;
    }

    public function addReport(Quantareport $report): self
    {
        if (!$this->report->contains($report)) {
            $this->report[] = $report;
            $report->setClient($this);
        }

        return $this;
    }

    public function removeReport(Quantareport $report): self
    {
        if ($this->report->removeElement($report)) {
            // set the owning side to null (unless already changed)
            if ($report->getClient() === $this) {
                $report->setClient(null);
            }
        }

        return $this;
    }
}
