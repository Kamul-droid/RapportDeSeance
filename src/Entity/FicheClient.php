<?php

namespace App\Entity;

use App\Repository\FicheClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FicheClientRepository::class)
 */
class FicheClient
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
    private $nom;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity=ProfilAcuMeridien::class, mappedBy="ficheClient")
     */
    private $acupuncture;

    /**
     * @ORM\OneToMany(targetEntity=ProfilAllergie::class, mappedBy="ficheClient")
     */
    private $allergie;

    /**
     * @ORM\OneToMany(targetEntity=ProfilAnimaux::class, mappedBy="ficheClient")
     */
    private $animaux;

    /**
     * @ORM\OneToMany(targetEntity=ProfilBioFeedBackGemmes::class, mappedBy="ficheClient")
     */
    private $biofeedback;

    /**
     * @ORM\OneToMany(targetEntity=ProfilCellCom::class, mappedBy="ficheClient")
     */
    private $cell_com;

    /**
     * @ORM\OneToMany(targetEntity=ProfilCerveau::class, mappedBy="ficheClient")
     */
    private $cerveau;

    /**
     * @ORM\OneToMany(targetEntity=ProfilChromosomesEtGenes::class, mappedBy="ficheClient")
     */
    private $chromosomes;

    /**
     * @ORM\OneToMany(targetEntity=ProfilCirculationCoeur::class, mappedBy="ficheClient")
     */
    private $circulation_coeur;

    /**
     * @ORM\OneToMany(targetEntity=ProfilCosmetique::class, mappedBy="ficheClient")
     */
    private $cosmetique;

    /**
     * @ORM\OneToMany(targetEntity=ProfilCouleursChakras::class, mappedBy="ficheClient")
     */
    private $couleurs_chakras;

    /**
     * @ORM\OneToMany(targetEntity=ProfilDentaire::class, mappedBy="ficheClient")
     */
    private $dentaire;

    /**
     * @ORM\OneToMany(targetEntity=ProfilDetoxEtStressMultiples::class, mappedBy="ficheClient")
     */
    private $detox_stress;

    /**
     * @ORM\OneToMany(targetEntity=ProfilDigestifs::class, mappedBy="ficheClient")
     */
    private $digestifs;

    /**
     * @ORM\OneToMany(targetEntity=ProfilDimensionnel::class, mappedBy="ficheClient")
     */
    private $dimensionnel;

    /**
     * @ORM\OneToMany(targetEntity=ProfilHomeopathique::class, mappedBy="ficheClient")
     */
    private $homeopathique;

    /**
     * @ORM\OneToMany(targetEntity=ProfilHomeopathique::class, mappedBy="ficheClient")
     */
    private $hormonal;

    /**
     * @ORM\OneToMany(targetEntity=ProfilIridologie::class, mappedBy="ficheClient")
     */
    private $iridologie;

    /**
     * @ORM\OneToMany(targetEntity=ProfilLymphatique::class, mappedBy="ficheClient")
     */
    private $lymphatique;

    /**
     * @ORM\OneToMany(targetEntity=ProfilMusculaire::class, mappedBy="ficheClient")
     */
    private $musculaire;

    /**
     * @ORM\OneToMany(targetEntity=ProfilNerfs::class, mappedBy="ficheClient")
     */
    private $nerfs;

    /**
     * @ORM\OneToMany(targetEntity=ProfilNeuroEmotionnel::class, mappedBy="ficheClient")
     */
    private $neur_emotionnel;

    /**
     * @ORM\OneToMany(targetEntity=ProfilNutrition::class, mappedBy="ficheClient")
     */
    private $nutrition;

    /**
     * @ORM\OneToMany(targetEntity=ProfilOreillesYeux::class, mappedBy="ficheClient")
     */
    private $oreilles_yeux;

    /**
     * @ORM\OneToMany(targetEntity=ProfilOs::class, mappedBy="ficheClient")
     */
    private $os;

    /**
     * @ORM\OneToMany(targetEntity=ProfilRachidien::class, mappedBy="ficheClient")
     */
    private $rachidien;

    /**
     * @ORM\OneToMany(targetEntity=ProfilRegistreAutoProgramme::class, mappedBy="ficheClient")
     */
    private $registre_auto_programme;

    /**
     * @ORM\OneToMany(targetEntity=ProfilRegistreSusceptibilite::class, mappedBy="ficheClient")
     */
    private $susceptibilite;

    /**
     * @ORM\OneToMany(targetEntity=ProfilRespiratoire::class, mappedBy="ficheClient")
     */
    private $respiratoire;

    /**
     * @ORM\OneToMany(targetEntity=ProfilRifeSimili::class, mappedBy="ficheClient")
     */
    private $rife_simili;

    /**
     * @ORM\OneToMany(targetEntity=ProfilSinusGorge::class, mappedBy="ficheClient")
     */
    private $sinus_gorge;

    /**
     * @ORM\OneToMany(targetEntity=ProfilTransformationEmtionnelleEtChronologique::class, mappedBy="ficheClient")
     */
    private $transformation_emtionnelle;

    public function __construct()
    {
        $this->acupuncture = new ArrayCollection();
        $this->allergie = new ArrayCollection();
        $this->animaux = new ArrayCollection();
        $this->biofeedback = new ArrayCollection();
        $this->cell_com = new ArrayCollection();
        $this->cerveau = new ArrayCollection();
        $this->chromosomes = new ArrayCollection();
        $this->circulation_coeur = new ArrayCollection();
        $this->cosmetique = new ArrayCollection();
        $this->couleurs_chakras = new ArrayCollection();
        $this->dentaire = new ArrayCollection();
        $this->detox_stress = new ArrayCollection();
        $this->digestifs = new ArrayCollection();
        $this->dimensionnel = new ArrayCollection();
        $this->homeopathique = new ArrayCollection();
        $this->hormonal = new ArrayCollection();
        $this->iridologie = new ArrayCollection();
        $this->lymphatique = new ArrayCollection();
        $this->musculaire = new ArrayCollection();
        $this->nerfs = new ArrayCollection();
        $this->neur_emotionnel = new ArrayCollection();
        $this->nutrition = new ArrayCollection();
        $this->oreilles_yeux = new ArrayCollection();
        $this->os = new ArrayCollection();
        $this->rachidien = new ArrayCollection();
        $this->registre_auto_programme = new ArrayCollection();
        $this->susceptibilite = new ArrayCollection();
        $this->respiratoire = new ArrayCollection();
        $this->rife_simili = new ArrayCollection();
        $this->sinus_gorge = new ArrayCollection();
        $this->transformation_emtionnelle = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection<int, ProfilAcuMeridien>
     */
    public function getAcupuncture(): Collection
    {
        return $this->acupuncture;
    }

    public function addAcupuncture(ProfilAcuMeridien $acupuncture): self
    {
        if (!$this->acupuncture->contains($acupuncture)) {
            $this->acupuncture[] = $acupuncture;
            $acupuncture->setFicheClient($this);
        }

        return $this;
    }

    public function removeAcupuncture(ProfilAcuMeridien $acupuncture): self
    {
        if ($this->acupuncture->removeElement($acupuncture)) {
            // set the owning side to null (unless already changed)
            if ($acupuncture->getFicheClient() === $this) {
                $acupuncture->setFicheClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProfilAllergie>
     */
    public function getAllergie(): Collection
    {
        return $this->allergie;
    }

    public function addAllergie(ProfilAllergie $allergie): self
    {
        if (!$this->allergie->contains($allergie)) {
            $this->allergie[] = $allergie;
            $allergie->setFicheClient($this);
        }

        return $this;
    }

    public function removeAllergie(ProfilAllergie $allergie): self
    {
        if ($this->allergie->removeElement($allergie)) {
            // set the owning side to null (unless already changed)
            if ($allergie->getFicheClient() === $this) {
                $allergie->setFicheClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProfilAnimaux>
     */
    public function getAnimaux(): Collection
    {
        return $this->animaux;
    }

    public function addAnimaux(ProfilAnimaux $animaux): self
    {
        if (!$this->animaux->contains($animaux)) {
            $this->animaux[] = $animaux;
            $animaux->setFicheClient($this);
        }

        return $this;
    }

    public function removeAnimaux(ProfilAnimaux $animaux): self
    {
        if ($this->animaux->removeElement($animaux)) {
            // set the owning side to null (unless already changed)
            if ($animaux->getFicheClient() === $this) {
                $animaux->setFicheClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProfilBioFeedBackGemmes>
     */
    public function getBiofeedback(): Collection
    {
        return $this->biofeedback;
    }

    public function addBiofeedback(ProfilBioFeedBackGemmes $biofeedback): self
    {
        if (!$this->biofeedback->contains($biofeedback)) {
            $this->biofeedback[] = $biofeedback;
            $biofeedback->setFicheClient($this);
        }

        return $this;
    }

    public function removeBiofeedback(ProfilBioFeedBackGemmes $biofeedback): self
    {
        if ($this->biofeedback->removeElement($biofeedback)) {
            // set the owning side to null (unless already changed)
            if ($biofeedback->getFicheClient() === $this) {
                $biofeedback->setFicheClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProfilCellCom>
     */
    public function getCellCom(): Collection
    {
        return $this->cell_com;
    }

    public function addCellCom(ProfilCellCom $cellCom): self
    {
        if (!$this->cell_com->contains($cellCom)) {
            $this->cell_com[] = $cellCom;
            $cellCom->setFicheClient($this);
        }

        return $this;
    }

    public function removeCellCom(ProfilCellCom $cellCom): self
    {
        if ($this->cell_com->removeElement($cellCom)) {
            // set the owning side to null (unless already changed)
            if ($cellCom->getFicheClient() === $this) {
                $cellCom->setFicheClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProfilCerveau>
     */
    public function getCerveau(): Collection
    {
        return $this->cerveau;
    }

    public function addCerveau(ProfilCerveau $cerveau): self
    {
        if (!$this->cerveau->contains($cerveau)) {
            $this->cerveau[] = $cerveau;
            $cerveau->setFicheClient($this);
        }

        return $this;
    }

    public function removeCerveau(ProfilCerveau $cerveau): self
    {
        if ($this->cerveau->removeElement($cerveau)) {
            // set the owning side to null (unless already changed)
            if ($cerveau->getFicheClient() === $this) {
                $cerveau->setFicheClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProfilChromosomesEtGenes>
     */
    public function getChromosomes(): Collection
    {
        return $this->chromosomes;
    }

    public function addChromosome(ProfilChromosomesEtGenes $chromosome): self
    {
        if (!$this->chromosomes->contains($chromosome)) {
            $this->chromosomes[] = $chromosome;
            $chromosome->setFicheClient($this);
        }

        return $this;
    }

    public function removeChromosome(ProfilChromosomesEtGenes $chromosome): self
    {
        if ($this->chromosomes->removeElement($chromosome)) {
            // set the owning side to null (unless already changed)
            if ($chromosome->getFicheClient() === $this) {
                $chromosome->setFicheClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProfilCirculationCoeur>
     */
    public function getCirculationCoeur(): Collection
    {
        return $this->circulation_coeur;
    }

    public function addCirculationCoeur(ProfilCirculationCoeur $circulationCoeur): self
    {
        if (!$this->circulation_coeur->contains($circulationCoeur)) {
            $this->circulation_coeur[] = $circulationCoeur;
            $circulationCoeur->setFicheClient($this);
        }

        return $this;
    }

    public function removeCirculationCoeur(ProfilCirculationCoeur $circulationCoeur): self
    {
        if ($this->circulation_coeur->removeElement($circulationCoeur)) {
            // set the owning side to null (unless already changed)
            if ($circulationCoeur->getFicheClient() === $this) {
                $circulationCoeur->setFicheClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProfilCosmetique>
     */
    public function getCosmetique(): Collection
    {
        return $this->cosmetique;
    }

    public function addCosmetique(ProfilCosmetique $cosmetique): self
    {
        if (!$this->cosmetique->contains($cosmetique)) {
            $this->cosmetique[] = $cosmetique;
            $cosmetique->setFicheClient($this);
        }

        return $this;
    }

    public function removeCosmetique(ProfilCosmetique $cosmetique): self
    {
        if ($this->cosmetique->removeElement($cosmetique)) {
            // set the owning side to null (unless already changed)
            if ($cosmetique->getFicheClient() === $this) {
                $cosmetique->setFicheClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProfilCouleursChakras>
     */
    public function getCouleursChakras(): Collection
    {
        return $this->couleurs_chakras;
    }

    public function addCouleursChakra(ProfilCouleursChakras $couleursChakra): self
    {
        if (!$this->couleurs_chakras->contains($couleursChakra)) {
            $this->couleurs_chakras[] = $couleursChakra;
            $couleursChakra->setFicheClient($this);
        }

        return $this;
    }

    public function removeCouleursChakra(ProfilCouleursChakras $couleursChakra): self
    {
        if ($this->couleurs_chakras->removeElement($couleursChakra)) {
            // set the owning side to null (unless already changed)
            if ($couleursChakra->getFicheClient() === $this) {
                $couleursChakra->setFicheClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProfilDentaire>
     */
    public function getDentaire(): Collection
    {
        return $this->dentaire;
    }

    public function addDentaire(ProfilDentaire $dentaire): self
    {
        if (!$this->dentaire->contains($dentaire)) {
            $this->dentaire[] = $dentaire;
            $dentaire->setFicheClient($this);
        }

        return $this;
    }

    public function removeDentaire(ProfilDentaire $dentaire): self
    {
        if ($this->dentaire->removeElement($dentaire)) {
            // set the owning side to null (unless already changed)
            if ($dentaire->getFicheClient() === $this) {
                $dentaire->setFicheClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProfilDetoxEtStressMultiples>
     */
    public function getDetoxStress(): Collection
    {
        return $this->detox_stress;
    }

    public function addDetoxStress(ProfilDetoxEtStressMultiples $detoxStress): self
    {
        if (!$this->detox_stress->contains($detoxStress)) {
            $this->detox_stress[] = $detoxStress;
            $detoxStress->setFicheClient($this);
        }

        return $this;
    }

    public function removeDetoxStress(ProfilDetoxEtStressMultiples $detoxStress): self
    {
        if ($this->detox_stress->removeElement($detoxStress)) {
            // set the owning side to null (unless already changed)
            if ($detoxStress->getFicheClient() === $this) {
                $detoxStress->setFicheClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProfilDigestifs>
     */
    public function getDigestifs(): Collection
    {
        return $this->digestifs;
    }

    public function addDigestif(ProfilDigestifs $digestif): self
    {
        if (!$this->digestifs->contains($digestif)) {
            $this->digestifs[] = $digestif;
            $digestif->setFicheClient($this);
        }

        return $this;
    }

    public function removeDigestif(ProfilDigestifs $digestif): self
    {
        if ($this->digestifs->removeElement($digestif)) {
            // set the owning side to null (unless already changed)
            if ($digestif->getFicheClient() === $this) {
                $digestif->setFicheClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProfilDimensionnel>
     */
    public function getDimensionnel(): Collection
    {
        return $this->dimensionnel;
    }

    public function addDimensionnel(ProfilDimensionnel $dimensionnel): self
    {
        if (!$this->dimensionnel->contains($dimensionnel)) {
            $this->dimensionnel[] = $dimensionnel;
            $dimensionnel->setFicheClient($this);
        }

        return $this;
    }

    public function removeDimensionnel(ProfilDimensionnel $dimensionnel): self
    {
        if ($this->dimensionnel->removeElement($dimensionnel)) {
            // set the owning side to null (unless already changed)
            if ($dimensionnel->getFicheClient() === $this) {
                $dimensionnel->setFicheClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProfilHomeopathique>
     */
    public function getHomeopathique(): Collection
    {
        return $this->homeopathique;
    }

    public function addHomeopathique(ProfilHomeopathique $homeopathique): self
    {
        if (!$this->homeopathique->contains($homeopathique)) {
            $this->homeopathique[] = $homeopathique;
            $homeopathique->setFicheClient($this);
        }

        return $this;
    }

    public function removeHomeopathique(ProfilHomeopathique $homeopathique): self
    {
        if ($this->homeopathique->removeElement($homeopathique)) {
            // set the owning side to null (unless already changed)
            if ($homeopathique->getFicheClient() === $this) {
                $homeopathique->setFicheClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProfilHomeopathique>
     */
    public function getHormonal(): Collection
    {
        return $this->hormonal;
    }

    public function addHormonal(ProfilHomeopathique $hormonal): self
    {
        if (!$this->hormonal->contains($hormonal)) {
            $this->hormonal[] = $hormonal;
            $hormonal->setFicheClient($this);
        }

        return $this;
    }

    public function removeHormonal(ProfilHomeopathique $hormonal): self
    {
        if ($this->hormonal->removeElement($hormonal)) {
            // set the owning side to null (unless already changed)
            if ($hormonal->getFicheClient() === $this) {
                $hormonal->setFicheClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProfilIridologie>
     */
    public function getIridologie(): Collection
    {
        return $this->iridologie;
    }

    public function addIridologie(ProfilIridologie $iridologie): self
    {
        if (!$this->iridologie->contains($iridologie)) {
            $this->iridologie[] = $iridologie;
            $iridologie->setFicheClient($this);
        }

        return $this;
    }

    public function removeIridologie(ProfilIridologie $iridologie): self
    {
        if ($this->iridologie->removeElement($iridologie)) {
            // set the owning side to null (unless already changed)
            if ($iridologie->getFicheClient() === $this) {
                $iridologie->setFicheClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProfilLymphatique>
     */
    public function getLymphatique(): Collection
    {
        return $this->lymphatique;
    }

    public function addLymphatique(ProfilLymphatique $lymphatique): self
    {
        if (!$this->lymphatique->contains($lymphatique)) {
            $this->lymphatique[] = $lymphatique;
            $lymphatique->setFicheClient($this);
        }

        return $this;
    }

    public function removeLymphatique(ProfilLymphatique $lymphatique): self
    {
        if ($this->lymphatique->removeElement($lymphatique)) {
            // set the owning side to null (unless already changed)
            if ($lymphatique->getFicheClient() === $this) {
                $lymphatique->setFicheClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProfilMusculaire>
     */
    public function getMusculaire(): Collection
    {
        return $this->musculaire;
    }

    public function addMusculaire(ProfilMusculaire $musculaire): self
    {
        if (!$this->musculaire->contains($musculaire)) {
            $this->musculaire[] = $musculaire;
            $musculaire->setFicheClient($this);
        }

        return $this;
    }

    public function removeMusculaire(ProfilMusculaire $musculaire): self
    {
        if ($this->musculaire->removeElement($musculaire)) {
            // set the owning side to null (unless already changed)
            if ($musculaire->getFicheClient() === $this) {
                $musculaire->setFicheClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProfilNerfs>
     */
    public function getNerfs(): Collection
    {
        return $this->nerfs;
    }

    public function addNerf(ProfilNerfs $nerf): self
    {
        if (!$this->nerfs->contains($nerf)) {
            $this->nerfs[] = $nerf;
            $nerf->setFicheClient($this);
        }

        return $this;
    }

    public function removeNerf(ProfilNerfs $nerf): self
    {
        if ($this->nerfs->removeElement($nerf)) {
            // set the owning side to null (unless already changed)
            if ($nerf->getFicheClient() === $this) {
                $nerf->setFicheClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProfilNeuroEmotionnel>
     */
    public function getNeurEmotionnel(): Collection
    {
        return $this->neur_emotionnel;
    }

    public function addNeurEmotionnel(ProfilNeuroEmotionnel $neurEmotionnel): self
    {
        if (!$this->neur_emotionnel->contains($neurEmotionnel)) {
            $this->neur_emotionnel[] = $neurEmotionnel;
            $neurEmotionnel->setFicheClient($this);
        }

        return $this;
    }

    public function removeNeurEmotionnel(ProfilNeuroEmotionnel $neurEmotionnel): self
    {
        if ($this->neur_emotionnel->removeElement($neurEmotionnel)) {
            // set the owning side to null (unless already changed)
            if ($neurEmotionnel->getFicheClient() === $this) {
                $neurEmotionnel->setFicheClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProfilNutrition>
     */
    public function getNutrition(): Collection
    {
        return $this->nutrition;
    }

    public function addNutrition(ProfilNutrition $nutrition): self
    {
        if (!$this->nutrition->contains($nutrition)) {
            $this->nutrition[] = $nutrition;
            $nutrition->setFicheClient($this);
        }

        return $this;
    }

    public function removeNutrition(ProfilNutrition $nutrition): self
    {
        if ($this->nutrition->removeElement($nutrition)) {
            // set the owning side to null (unless already changed)
            if ($nutrition->getFicheClient() === $this) {
                $nutrition->setFicheClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProfilOreillesYeux>
     */
    public function getOreillesYeux(): Collection
    {
        return $this->oreilles_yeux;
    }

    public function addOreillesYeux(ProfilOreillesYeux $oreillesYeux): self
    {
        if (!$this->oreilles_yeux->contains($oreillesYeux)) {
            $this->oreilles_yeux[] = $oreillesYeux;
            $oreillesYeux->setFicheClient($this);
        }

        return $this;
    }

    public function removeOreillesYeux(ProfilOreillesYeux $oreillesYeux): self
    {
        if ($this->oreilles_yeux->removeElement($oreillesYeux)) {
            // set the owning side to null (unless already changed)
            if ($oreillesYeux->getFicheClient() === $this) {
                $oreillesYeux->setFicheClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProfilOs>
     */
    public function getOs(): Collection
    {
        return $this->os;
    }

    public function addO(ProfilOs $o): self
    {
        if (!$this->os->contains($o)) {
            $this->os[] = $o;
            $o->setFicheClient($this);
        }

        return $this;
    }

    public function removeO(ProfilOs $o): self
    {
        if ($this->os->removeElement($o)) {
            // set the owning side to null (unless already changed)
            if ($o->getFicheClient() === $this) {
                $o->setFicheClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProfilRachidien>
     */
    public function getRachidien(): Collection
    {
        return $this->rachidien;
    }

    public function addRachidien(ProfilRachidien $rachidien): self
    {
        if (!$this->rachidien->contains($rachidien)) {
            $this->rachidien[] = $rachidien;
            $rachidien->setFicheClient($this);
        }

        return $this;
    }

    public function removeRachidien(ProfilRachidien $rachidien): self
    {
        if ($this->rachidien->removeElement($rachidien)) {
            // set the owning side to null (unless already changed)
            if ($rachidien->getFicheClient() === $this) {
                $rachidien->setFicheClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProfilRegistreAutoProgramme>
     */
    public function getRegistreAutoProgramme(): Collection
    {
        return $this->registre_auto_programme;
    }

    public function addRegistreAutoProgramme(ProfilRegistreAutoProgramme $registreAutoProgramme): self
    {
        if (!$this->registre_auto_programme->contains($registreAutoProgramme)) {
            $this->registre_auto_programme[] = $registreAutoProgramme;
            $registreAutoProgramme->setFicheClient($this);
        }

        return $this;
    }

    public function removeRegistreAutoProgramme(ProfilRegistreAutoProgramme $registreAutoProgramme): self
    {
        if ($this->registre_auto_programme->removeElement($registreAutoProgramme)) {
            // set the owning side to null (unless already changed)
            if ($registreAutoProgramme->getFicheClient() === $this) {
                $registreAutoProgramme->setFicheClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProfilRegistreSusceptibilite>
     */
    public function getSusceptibilite(): Collection
    {
        return $this->susceptibilite;
    }

    public function addSusceptibilite(ProfilRegistreSusceptibilite $susceptibilite): self
    {
        if (!$this->susceptibilite->contains($susceptibilite)) {
            $this->susceptibilite[] = $susceptibilite;
            $susceptibilite->setFicheClient($this);
        }

        return $this;
    }

    public function removeSusceptibilite(ProfilRegistreSusceptibilite $susceptibilite): self
    {
        if ($this->susceptibilite->removeElement($susceptibilite)) {
            // set the owning side to null (unless already changed)
            if ($susceptibilite->getFicheClient() === $this) {
                $susceptibilite->setFicheClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProfilRespiratoire>
     */
    public function getRespiratoire(): Collection
    {
        return $this->respiratoire;
    }

    public function addRespiratoire(ProfilRespiratoire $respiratoire): self
    {
        if (!$this->respiratoire->contains($respiratoire)) {
            $this->respiratoire[] = $respiratoire;
            $respiratoire->setFicheClient($this);
        }

        return $this;
    }

    public function removeRespiratoire(ProfilRespiratoire $respiratoire): self
    {
        if ($this->respiratoire->removeElement($respiratoire)) {
            // set the owning side to null (unless already changed)
            if ($respiratoire->getFicheClient() === $this) {
                $respiratoire->setFicheClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProfilRifeSimili>
     */
    public function getRifeSimili(): Collection
    {
        return $this->rife_simili;
    }

    public function addRifeSimili(ProfilRifeSimili $rifeSimili): self
    {
        if (!$this->rife_simili->contains($rifeSimili)) {
            $this->rife_simili[] = $rifeSimili;
            $rifeSimili->setFicheClient($this);
        }

        return $this;
    }

    public function removeRifeSimili(ProfilRifeSimili $rifeSimili): self
    {
        if ($this->rife_simili->removeElement($rifeSimili)) {
            // set the owning side to null (unless already changed)
            if ($rifeSimili->getFicheClient() === $this) {
                $rifeSimili->setFicheClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProfilSinusGorge>
     */
    public function getSinusGorge(): Collection
    {
        return $this->sinus_gorge;
    }

    public function addSinusGorge(ProfilSinusGorge $sinusGorge): self
    {
        if (!$this->sinus_gorge->contains($sinusGorge)) {
            $this->sinus_gorge[] = $sinusGorge;
            $sinusGorge->setFicheClient($this);
        }

        return $this;
    }

    public function removeSinusGorge(ProfilSinusGorge $sinusGorge): self
    {
        if ($this->sinus_gorge->removeElement($sinusGorge)) {
            // set the owning side to null (unless already changed)
            if ($sinusGorge->getFicheClient() === $this) {
                $sinusGorge->setFicheClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProfilTransformationEmtionnelleEtChronologique>
     */
    public function getTransformationEmtionnelle(): Collection
    {
        return $this->transformation_emtionnelle;
    }

    public function addTransformationEmtionnelle(ProfilTransformationEmtionnelleEtChronologique $transformationEmtionnelle): self
    {
        if (!$this->transformation_emtionnelle->contains($transformationEmtionnelle)) {
            $this->transformation_emtionnelle[] = $transformationEmtionnelle;
            $transformationEmtionnelle->setFicheClient($this);
        }

        return $this;
    }

    public function removeTransformationEmtionnelle(ProfilTransformationEmtionnelleEtChronologique $transformationEmtionnelle): self
    {
        if ($this->transformation_emtionnelle->removeElement($transformationEmtionnelle)) {
            // set the owning side to null (unless already changed)
            if ($transformationEmtionnelle->getFicheClient() === $this) {
                $transformationEmtionnelle->setFicheClient(null);
            }
        }

        return $this;
    }
}
