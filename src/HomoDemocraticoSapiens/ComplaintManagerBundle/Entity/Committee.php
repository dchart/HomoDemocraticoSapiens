<?php

namespace HomoDemocraticoSapiens\ComplaintManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * HomoDemocraticoSapiens\ComplaintManagerBundle\Entity\Committee
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Committee
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=50)
     * @Assert\NotBlank(message="Veuillez intituler la commission.")
     * @Assert\MinLength(limit=3, message="Le nom de la commission doit excéder {{limit}} caractères.")
     */
    private $name;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;
    
    /**
     * @ORM\OneToMany(targetEntity="Complaint", mappedBy="committee")
     */
    private $complaints;
    
    public function __construct()
    {
        $this->complaints = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add complaints
     *
     * @param HomoDemocraticoSapiens\ComplaintManagerBundle\Entity\Complaint $complaints
     */
    public function addComplaints(\HomoDemocraticoSapiens\ComplaintManagerBundle\Entity\Complaint $complaints)
    {
        $this->complaints[] = $complaints;
    }

    /**
     * Get complaints
     *
     * @return Doctrine\Common\Collections\Collection $complaints
     */
    public function getComplaints()
    {
        return $this->complaints;
    }

    public function __toString()
    {
       return $this->name;
    }
}
