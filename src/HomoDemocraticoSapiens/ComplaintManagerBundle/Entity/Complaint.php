<?php

namespace HomoDemocraticoSapiens\ComplaintManagerBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * HomoDemocraticoSapiens\ComplaintManagerBundle\Entity\Complaint
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Complaint
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
     * @ORM\ManyToOne(targetEntity="Committee", inversedBy="complaints")
     * @ORM\JoinColumn(name="committee_id", referencedColumnName="id")
     */
    protected $committee;

    /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=60)
     * @Assert\NotBlank()
     */
    private $title;

    /**
     * @var text $message
     *
     * @ORM\Column(name="message", type="text")
     * @Assert\NotBlank()
     */
    private $message;

    /**
     * @var boolean $is_censored
     *
     * @ORM\Column(name="is_censored", type="boolean")
     */
    private $is_censored;

    /**
     * @var string $censorship_justification
     *
     * @ORM\Column(name="censorship_justification", type="string", length=250)
     */
    private $censorship_justification;

    /**
     * @var integer $degree_of_assumption
     *
     * @ORM\Column(name="degree_of_assumption", type="integer")
     */
    private $degree_of_assumption;


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
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set message
     *
     * @param text $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * Get message
     *
     * @return text $message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set is_censored
     *
     * @param boolean $isCensored
     */
    public function setIsCensored($isCensored)
    {
        $this->is_censored = $isCensored;
    }

    /**
     * Get is_censored
     *
     * @return boolean $isCensored
     */
    public function getIsCensored()
    {
        return $this->is_censored;
    }

    /**
     * Set censorship_justification
     *
     * @param string $censorshipJustification
     */
    public function setCensorshipJustification($censorshipJustification)
    {
        $this->censorship_justification = $censorshipJustification;
    }

    /**
     * Get censorship_justification
     *
     * @return string $censorshipJustification
     */
    public function getCensorshipJustification()
    {
        return $this->censorship_justification;
    }

    /**
     * Set degree_of_assumption
     *
     * @param integer $degreeOfAssumption
     */
    public function setDegreeOfAssumption($degreeOfAssumption)
    {
        $this->degree_of_assumption = $degreeOfAssumption;
    }

    /**
     * Get degree_of_assumption
     *
     * @return integer $degreeOfAssumption
     */
    public function getDegreeOfAssumption()
    {
        return $this->degree_of_assumption;
    }

    /**
     * Increment degree_of_assumption
     *
     * @return integer $degreeOfAssumption
     */
    public function incrementDegreeOfAssumption()
    {
        $this->degree_of_assumption = $this->degree_of_assumption++;
    }

    /**
     * Decrement degree_of_assumption
     *
     * @return integer $degreeOfAssumption
     */
    public function decrementDegreeOfAssumption()
    {
        $this->degree_of_assumption = $this->degree_of_assumption--;
    }
    
    public function __construct()
    {
       $this->degree_of_assumption = 0;
    }
    
    public function __toString()
    {
       return $this->title;
    }
}
