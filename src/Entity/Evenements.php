<?php

namespace App\Entity;

use App\Repository\EvenementsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvenementsRepository::class)]
class Evenements
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 15)]
    private ?string $designation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 5, nullable: true)]
    private ?string $heure_debut = null;

    #[ORM\Column(length: 5, nullable: true)]
    private ?string $heure_fin = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $emplacement = null;

    #[ORM\Column(nullable: true)]
    private ?float $tarifA = null;

    #[ORM\Column(nullable: true)]
    private ?float $tarifNA = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $img_url = null;

    #[ORM\Column(type: Types::TEXT, length: 2000, nullable: true)]
    private ?string $map_url = null;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

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

    public function getHeureDebut(): ?string
    {
        return $this->heure_debut;
    }

    public function setHeureDebut(?string $heure_debut): self
    {
        $this->heure_debut = $heure_debut;

        return $this;
    }

    public function getHeureFin(): ?string
    {
        return $this->heure_fin;
    }

    public function setHeureFin(?string $heure_fin): self
    {
        $this->heure_fin = $heure_fin;

        return $this;
    }

    public function getEmplacement(): ?string
    {
        return $this->emplacement;
    }

    public function setEmplacement(string $emplacement): self
    {
        $this->emplacement = $emplacement;

        return $this;
    }

    public function getTarifA(): ?float
    {
        return $this->tarifA;
    }

    public function setTarifA(?float $tarifA): self
    {
        $this->tarifA = $tarifA;

        return $this;
    }

    public function getTarifNA(): ?float
    {
        return $this->tarifNA;
    }

    public function setTarifNA(?float $tarifNA): self
    {
        $this->tarifNA = $tarifNA;

        return $this;
    }

    public function getImgUrl(): ?string
    {
        return $this->img_url;
    }

    public function setImgUrl(?string $img_url): self
    {
        $this->img_url = $img_url;

        return $this;
    }

    public function getMapUrl(): ?string
    {
        return $this->map_url;
    }

    public function setMapUrl(?string $map_url): self
    {
        $this->map_url = $map_url;

        return $this;
    }
}
