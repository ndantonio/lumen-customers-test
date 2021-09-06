<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="customers")
*/
class Customer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $firstname;

    /**
     * @ORM\Column(type="string")
     */
    private $lastname;

    /**
     * @ORM\Column(type="string")
     */
    private $email;

    /**
     * @ORM\Column(type="string")
     */
    private $username;

    /**
     * @ORM\Column(type="string")
     */
    private $country;

    /**
     * @ORM\Column(type="string")
     */
    private $gender;

    /**
     * @ORM\Column(type="string")
     */
    private $city;

    /**
     * @ORM\Column(type="string")
     */
    private $phone;

    /**
     * @ORM\Column(type="string")
     */
    private $passwd;

    /**
     * Setters
     */
    public function setFirstName(string $firstname)
    {
        $this->firstname = $firstname;
    }

    public function setLastName(string $lastname)
    {
        $this->lastname = $lastname;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    public function setCountry(string $country)
    {
        $this->country = $country;
    }

    public function setCity(string $city)
    {
        $this->city = $city;
    }

    public function setGender(string $gender)
    {
        $this->gender = $gender;
    }

    public function setPhone(string $phone)
    {
        $this->phone = $phone;
    }

    public function setPassword(string $passwd)
    {
        $this->passwd = $passwd;
    }

    /**
     * Getters
     */
    public function getFirstName()
    {
        return $this->firstname;
    }

    public function getLastName()
    {
        return $this->lastname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getPassword()
    {
        return $this->passwd;
    }
}