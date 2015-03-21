<?php

namespace BookWebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Publisher
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Publisher
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
     @ORM\OneToMany(targetEntity="Book", mappedBy="books")
     * @ORM\Column(name="Books", type="string", length=255)
     */
    private $books;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=255)
     */
    private $name;


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
     * Set books
     *
     * @param string $books
     * @return Publisher
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
     * Set name
     *
     * @param string $name
     * @return Publisher
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
}
