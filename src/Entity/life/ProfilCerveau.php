<?php

namespace App\Entity\life;

use App\Repository\ProfilCerveauRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfilCerveauRepository::class)
 */
class ProfilCerveau
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
    private $reglage_ondes_cerebrales;

    /**
     * @ORM\Column(type="text")
     */
    private $ADD_;

    /**
     * @ORM\Column(type="text")
     */
    private $DHDA;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $equilibre_harmonique_cerveau_gauche_cerveau_droit;

    /**
     * @ORM\Column(type="text")
     */
    private $choix_item;

    /**
     * @ORM\ManyToOne(targetEntity=FicheClient::class, inversedBy="cerveau")
     */
    private $ficheClient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReglageOndesCerebrales(): ?string
    {
        return $this->reglage_ondes_cerebrales;
    }

    public function setReglageOndesCerebrales(string $reglage_ondes_cerebrales): self
    {
        $this->reglage_ondes_cerebrales = $reglage_ondes_cerebrales;

        return $this;
    }

    public function getADD(): ?string
    {
        return $this->ADD_;
    }

    public function setADD(string $ADD_): self
    {
        $this->ADD_ = $ADD_;

        return $this;
    }

    public function getDHDA(): ?string
    {
        return $this->DHDA;
    }

    public function setDHDA(string $DHDA): self
    {
        $this->DHDA = $DHDA;

        return $this;
    }

    public function getEquilibreHarmoniqueCerveauGaucheCerveauDroit(): ?string
    {
        return $this->equilibre_harmonique_cerveau_gauche_cerveau_droit;
    }

    public function setEquilibreHarmoniqueCerveauGaucheCerveauDroit(string $equilibre_harmonique_cerveau_gauche_cerveau_droit): self
    {
        $this->equilibre_harmonique_cerveau_gauche_cerveau_droit = $equilibre_harmonique_cerveau_gauche_cerveau_droit;

        return $this;
    }

    public function getChoixItem(): ?string
    {
        return $this->choix_item;
    }

    public function setChoixItem(string $choix_item): self
    {
        $this->choix_item = $choix_item;

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
