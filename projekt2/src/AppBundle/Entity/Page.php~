<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Page
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Page
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
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="Imie", type="string", length=20)
     */
    private $imie;

    /**
     * @var string
     *
     * @ORM\Column(name="Nazwisko", type="string", length=80)
     */
    private $nazwisko;

    /**
     * @var integer
     *
     * @ORM\Column(name="Wiek", type="smallint")
     */
    private $wiek;

    /**
     * @var string
     *
     * @ORM\Column(name="Numer", type="string", length=20)
     */
    private $numer;


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
     * Set content
     *
     * @param string $content
     * @return Page
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set imie
     *
     * @param string $imie
     * @return Page
     */
    public function setImie($imie)
    {
        $this->imie = $imie;

        return $this;
    }

    /**
     * Get imie
     *
     * @return string 
     */
    public function getImie()
    {
        return $this->imie;
    }

    /**
     * Set nazwisko
     *
     * @param string $nazwisko
     * @return Page
     */
    public function setNazwisko($nazwisko)
    {
        $this->nazwisko = $nazwisko;

        return $this;
    }

    /**
     * Get nazwisko
     *
     * @return string 
     */
    public function getNazwisko()
    {
        return $this->nazwisko;
    }

    /**
     * Set wiek
     *
     * @param integer $wiek
     * @return Page
     */
    public function setWiek($wiek)
    {
        $this->wiek = $wiek;

        return $this;
    }

    /**
     * Get wiek
     *
     * @return integer 
     */
    public function getWiek()
    {
        return $this->wiek;
    }

    /**
     * Set numer
     *
     * @param string $numer
     * @return Page
     */
    public function setNumer($numer)
    {
        $this->numer = $numer;

        return $this;
    }

    /**
     * Get numer
     *
     * @return string 
     */
    public function getNumer()
    {
        return $this->numer;
    }
}
