<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation as API;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity()
 *
 * @API\ApiResource()
 */
class User
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $username;

    /**
     * @var Profile
     * @ORM\OneToOne(targetEntity="Profile", mappedBy="user")
     * @API\ApiSubresource()
     */
    private $profile;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Balance", mappedBy="user")
     * @API\ApiSubresource()
     */
    private $balances;


    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->balances = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $name
     *
     * @return User
     */
    public function setUsername(string $name): User
    {
        $this->username = $name;

        return $this;
    }

    /**
     * @return Profile
     */
    public function getProfile(): ?Profile
    {
        return $this->profile;
    }

    /**
     * @param Profile $profile
     *
     * @return User
     */
    public function setProfile(Profile $profile): User
    {
        $this->profile = $profile;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getBalances()
    {
        return $this->balances;
    }

    /**
     * @param Balance $balance
     *
     * @return User
     */
    public function addBalance(Balance $balance): User
    {
        $this->balances[] = $balance;

        return $this;
    }

    /**
     * @param Balance $balance
     *
     * @return bool
     */
    public function removeBalance(Balance $balance): bool
    {
        return $this->balances->removeElement($balance);
    }

}
