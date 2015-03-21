<?php

namespace BookWebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints;

/**
 * Author
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Author
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="Name", type="string", length=255)
     */
    private $name;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Surname", type="string", length=255)
     */
    private $surname;

    /**
     * @var string, 
     *
     * @ORM\Column(name="Sex", type="string", length=128, nullable=true)
     */
    private $sex;

    /**
     * @var string
     *
     * @ORM\Column(name="Books", type="string", length=255, nullable=true)
     */
    private $books;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="BirthYear", type="datetime", nullable=true)
     */
    private $birthYear;
    /**
     * @var boolean
     *
     * @ORM\Column(name="Isdead", type="boolean", )
     */
    private $isDead;

    /**
     * Get id
     *
     * @return integer 
     */
    
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Author
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Set surname
     *
     * @param string $surname
     * @return Author
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }
    
    /**
     * Set sex
     *
     * @param string $sex
     * @return Author
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return string 
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set books
     *
     * @param string $books
     * @return Author
     */
    public function setBooks($books)
    {
        $this->books = $books;

        return $this;
    }

    /**
     * Get books
     *
     * @return string 
     */
    public function getBooks()
    {
        return $this->books;
    }

    /**
     * Set birthYear
     *
     * @param \DateTime $birthYear
     * @return Author
     */
    public function setBirthYear($birthYear)
    {
        $this->birthYear = $birthYear;

        return $this;
    }

    /**
     * Get birthYear
     *
     * @return \DateTime 
     */
    public function getBirthYear()
    {
        return $this->birthYear;
    }

    /**
     * Set isDead
     *
     * @param boolean $isDead
     * @return Author
     */
    public function setIsDead($isDead)
    {
        $this->isDead = $isDead;

        return $this;
    }

    /**
     * Get isDead
     *
     * @return boolean 
     */
    public function getIsDead()
    {
        return $this->isDead;
    }
    public function __construct() {
        $this->isDead=false;
    }
}
