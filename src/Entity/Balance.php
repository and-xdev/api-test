<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation as API;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation as Serializer;


/**
 * @ORM\Entity()
 *
 * @API\ApiResource()
 */
class Balance
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="User", inversedBy="balances")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $user;

    /**
     * @var string
     * @ORM\Column(type="decimal", precision=20, scale=8, options={"default": 0.0})
     */
    private $amount = "0.0";

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $currency;


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User $user
     *
     * @return Balance
     */
    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @param $amount
     *
     * @return Balance
     */
    public function setAmount(string $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     *
     * @return Balance
     */
    public function setCurrency(string $currency): Balance
    {
        $this->currency = $currency;
        return $this;
    }

}
