<?php

namespace App\Entity;

use App\Repository\PersonnalContentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use DateTime;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PersonnalContentRepository::class)
 * @Vich\Uploadable
 */
class PersonnalContent
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private string $lastname;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private string $firstname;

    /**
     * @ORM\Column(type="datetime")
     */
    private DateTime $birthday;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $adress;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private string $town;

    /**
     * @ORM\Column(type="integer")
     */
    private int $zip_code;

    /**
     * @ORM\Column(type="bigint")
     */
    private int $phone_number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $github_link;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $linkedin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $picture = "";

    /**
     * @Vich\UploadableField (mapping="poster_file", fileNameProperty="picture")
     * @Assert\File(
     *     maxSize = "5M",
     *     mimeTypes = {"image/jpeg", "image/png", "image/webp"},
     *     mimeTypesMessage="Please upload a valid image",
     *     )
     * @var ?File
     */
    private $pictureFile;

    /**
     * @ORM\Column (type="datetime", nullable=true)
     * @var DateTime|null
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="text")
     */
    private $summary = "";

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getTown(): ?string
    {
        return $this->town;
    }

    public function setTown(string $town): self
    {
        $this->town = $town;

        return $this;
    }

    public function getZipCode(): ?int
    {
        return $this->zip_code;
    }

    public function setZipCode(int $zip_code): self
    {
        $this->zip_code = $zip_code;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getGithubLink(): ?string
    {
        return $this->github_link;
    }

    public function setGithubLink(?string $github_link): self
    {
        $this->github_link = $github_link;

        return $this;
    }

    public function getLinkedin(): ?string
    {
        return $this->linkedin;
    }

    public function setLinkedin(?string $linkedin): self
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * @return File
     */
    public function getPictureFile(): ?File
    {
        return $this->pictureFile;
    }

    /**
     * @param File $pictureFile
     */
    public function setPictureFile(?File $pictureFile = null): void
    {
        $this->pictureFile = $pictureFile;

        if ($pictureFile) {
            $this->updatedAt = new DateTime('now');
        }
    }

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }


}
