<?php

namespace App\Entity;

use App\Repository\InsertedObjectRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\String\Slugger\AsciiSlugger;

#[ORM\Entity(repositoryClass: InsertedObjectRepository::class)]
class InsertedObject
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(string $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $slugger = new AsciiSlugger();

        $this->name = $name;
        $this->slug = $slugger->slug($this->name)->lower();

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }
}
