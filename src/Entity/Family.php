<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FamilyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FamilyRepository::class)
 * @ApiResource()
 */
class Family
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=MusicInstrument::class, mappedBy="family")
     */
    private $musicInstrument;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    public function __construct()
    {
        $this->musicInstrument = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|MusicInstrument[]
     */
    public function getMusicInstrument(): Collection
    {
        return $this->musicInstrument;
    }

    public function addMusicInstrument(MusicInstrument $musicInstrument): self
    {
        if (!$this->musicInstrument->contains($musicInstrument)) {
            $this->musicInstrument[] = $musicInstrument;
            $musicInstrument->setFamily($this);
        }

        return $this;
    }

    public function removeMusicInstrument(MusicInstrument $musicInstrument): self
    {
        if ($this->musicInstrument->contains($musicInstrument)) {
            $this->musicInstrument->removeElement($musicInstrument);
            // set the owning side to null (unless already changed)
            if ($musicInstrument->getFamily() === $this) {
                $musicInstrument->setFamily(null);
            }
        }

        return $this;
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
}
