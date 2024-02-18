<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentRepository::class)]
class Comment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $review = null;

    #[ORM\Column(length: 255)]
    private ?string $descript = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReview(): ?int
    {
        return $this->review;
    }

    public function setReview(int $review): static
    {
        $this->review = $review;

        return $this;
    }

    public function getDescript(): ?string
    {
        return $this->descript;
    }

    public function setDescript(string $descript): static
    {
        $this->descript = $descript;

        return $this;
    }
}
