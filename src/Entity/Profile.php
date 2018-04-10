<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation as API;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity()
 *
 * @API\ApiResource()
 */
class Profile
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var User
     * @ORM\OneToOne(targetEntity="User", inversedBy="profile")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $user;

    /**
     * @var string
     * @ORM\Column(type="string", options={"default": ""})
     */
    private $firstName = '';

    /**
     * @var string
     * @ORM\Column(type="string", options={"default": ""})
     */
    private $lastName = '';


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return User
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User $user
     *
     * @return Profile
     */
    public function setUser(User $user): Profile
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     *
     * @return Profile
     */
    public function setFirstName(string $firstName): Profile
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     *
     * @return Profile
     */
    public function setLastName(string $lastName): Profile
    {
        $this->lastName = $lastName;

        return $this;
    }

}
