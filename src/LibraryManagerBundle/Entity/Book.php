<?php

namespace LibraryManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Book
 *
 * @ORM\Table(name="book")
 * @ORM\Entity(repositoryClass="LibraryManagerBundle\Repository\BookRepository")
 */
class Book
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=50)
     * @Assert\NotBlank()
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      max = 100,
     *      minMessage = "Votre titre doit avoir au moins {{ limit }} caractères",
     *      maxMessage = "Votre titre doit avoir au maximum {{ limit }} caractères"
     * )
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=50)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Votre auteur doit avoir au moins {{ limit }} caractères",
     *      maxMessage = "Votre auteur doit avoir au maximum {{ limit }} caractères"
     * )
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="resume", type="text")
     * @Assert\NotBlank()
     */
    private $resume;

    /**
     * @var int
     *
     * @ORM\Column(name="releaseDate", type="integer")
     * @Assert\NotBlank()
     */
    private $releaseDate;

    /**
     * @var bool
     *
     * @ORM\Column(name="availability", type="boolean")
     * @Assert\Regex(
     *     pattern="^\d{4}$",
     *     message="La date doit être de type ****"
     * )
     */
    private $availability;

      /**
   * @ORM\ManyToOne(targetEntity="LibraryManagerBundle\Entity\Member", inversedBy="books", cascade={"persist"})
   * @ORM\JoinColumn(nullable=true)
   */
  private $member;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Book
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Book
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set author
     *
     * @param string $author
     *
     * @return Book
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set resume
     *
     * @param string $resume
     *
     * @return Book
     */
    public function setResume($resume)
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * Get resume
     *
     * @return string
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * Set releaseDate
     *
     * @param integer $releaseDate
     *
     * @return Book
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    /**
     * Get releaseDate
     *
     * @return int
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * Set availability
     *
     * @param boolean $availability
     *
     * @return Book
     */
    public function setAvailability($availability)
    {
        $this->availability = $availability;

        return $this;
    }

    /**
     * Get availability
     *
     * @return bool
     */
    public function getAvailability()
    {
        return $this->availability;
    }

    /**
     * Set member
     *
     * @param \LibraryManagerBundle\Entity\Member $member
     *
     * @return Book
     */
    public function setMember(\LibraryManagerBundle\Entity\Member $member = null)
    {
        $this->member = $member;

        return $this;
    }

    /**
     * Get member
     *
     * @return \LibraryManagerBundle\Entity\Member
     */
    public function getMember()
    {
        return $this->member;
    }
}
