<?php

namespace App\Entity;

use App\Repository\ContentRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTime;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ContentRepository::class)
 */
class Content
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=45)
     * @Assert\Length (
     *     min=2,
     *     max=45,
     *     maxMessage="Le nom ne doit pas dépasser {{ limit }} caractéres."
     * )
     * @Assert\NotBlank
     */
    private string $name;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private DateTime $date;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private string $description = "";
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $localisation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $template;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="contents")
     */
    private  ?Category $category;


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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

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

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(?string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getTemplate(): ?string
    {
        return $this->template;
    }

    public function setTemplate(?string $template): self
    {
        $this->template = $template;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
