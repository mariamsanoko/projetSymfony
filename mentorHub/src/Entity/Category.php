<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: Mentor::class, mappedBy: 'categories')]
    private Collection $mentors;

    public function __construct()
    {
        $this->mentors = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Mentor>
     */
    public function getMentors(): Collection
    {
        return $this->mentors;
    }

    public function addMentor(Mentor $mentor): static
    {
        if (!$this->mentors->contains($mentor)) {
            $this->mentors->add($mentor);
            $mentor->addCategory($this);
        }

        return $this;
    }

    public function removeMentor(Mentor $mentor): static
    {
        if ($this->mentors->removeElement($mentor)) {
            $mentor->removeCategory($this);
        }

        return $this;
    }
}
