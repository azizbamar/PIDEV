<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
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
    #[Assert\NotBlank(message: 'Le contenu ne peut pas être vide')]
    private ?int $review = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le contenu ne peut pas être vide')]
    #[Assert\Regex(
        pattern: '/^[a-zA-ZÀ-ÿ\s]+$/',
        message: 'Le nom ne peut contenir que des lettres.'
    )]
    #[Assert\Length(
        max: 255,
        maxMessage: 'Le nom ne peut pas dépasser {{ limit }} caractères.'
    )]
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
