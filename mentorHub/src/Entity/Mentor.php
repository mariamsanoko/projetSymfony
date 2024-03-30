<?php

namespace App\Entity;

use App\Repository\MentorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MentorRepository::class)]
class Mentor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $bio = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column]
    private ?int $yearExpertise = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $price = null;

    #[ORM\OneToOne(inversedBy: 'mentor', cascade: ['persist', 'remove'])]
    private ?MentorSession $learns = null;

    #[ORM\ManyToMany(targetEntity: Tag::class, inversedBy: 'mentors')]
    private Collection $tags;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\ManyToOne(inversedBy: 'author')]
    private ?Category $category = null;

    #[ORM\Column(length: 255)]
    private ?string $mentorName = null;

    #[ORM\ManyToOne(inversedBy: 'mentors')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $categories = null;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(string $bio): static
    {
        $this->bio = $bio;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getYearExpertise(): ?int
    {
        return $this->yearExpertise;
    }

    public function setYearExpertise(int $yearExpertise): static
    {
        $this->yearExpertise = $yearExpertise;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getLearns(): ?MentorSession
    {
        return $this->learns;
    }

    public function setLearns(?MentorSession $learns): static
    {
        $this->learns = $learns;

        return $this;
    }

    /**
     * @return Collection<int, Tag>
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): static
    {
        if (!$this->tags->contains($tag)) {
            $this->tags->add($tag);
        }

        return $this;
    }

    public function removeTag(Tag $tag): static
    {
        $this->tags->removeElement($tag);

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getMentorName(): ?string
    {
        return $this->mentorName;
    }

    public function setMentorName(string $mentorName): static
    {
        $this->mentorName = $mentorName;

        return $this;
    }

    public function getCategories(): ?Category
    {
        return $this->categories;
    }

    public function setCategories(?Category $categories): static
    {
        $this->categories = $categories;

        return $this;
    }
}
