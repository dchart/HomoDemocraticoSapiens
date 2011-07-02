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
     * @Assert\NotBlank(message="Veuillez désigner la commission la plus pertinente.")
     */
    protected $committee;

    /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=60)
     * @Assert\NotBlank(message="Pensez à titre clair, concis et évocateur !")
     * @Assert\MinLength(limit=5, message="Vous êtes trop taciturne ! {{ limit }} caractères minimum.")
     * @Assert\MaxLength(limit=60, message="Votre titre doit être plus concis ! {{ limit }} caractères maximum.")
     */
    private $title;

    /**
     * @var text $message
     *
     * @ORM\Column(name="message", type="text")
     * @Assert\NotBlank(message="Vous avez oublié de rédiger votre doléance !")
     * @Assert\MinLength(limit=25, message="Vous êtes trop taciturne ! {{ limit }} caractères minimum.")
     */
    private $message;

    /**
     * @var boolean $is_censored
     *
     * @ORM\Column(name="is_censored", type="boolean")
     */
    private $is_censored = false;

    /**
     * @var string $censorship_justification
     *
     * @ORM\Column(name="censorship_justification", type="string", length=250, nullable=true)
     */
    private $censorship_justification;

    /**
     * @var integer $degree_of_assumption
     *
     * @ORM\Column(name="degree_of_assumption", type="integer")
     */
    private $degree_of_assumption = 0;

    /**
     * @var datetime $created_at
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $created_at;


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
    
    public function __toString()
    {
       return $this->title;
    }

    public function __construct(){
        $this->created_at = new \DateTime();
    }
    
    /**
     * Set created_at
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->created_at = $createdAt;
    }
 
    /**
     * Get created_at
     *
     * @return datetime $createdAt
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set committee
     *
     * @param HomoDemocraticoSapiens\ComplaintManagerBundle\Entity\Committee $committee
     */
    public function setCommittee(\HomoDemocraticoSapiens\ComplaintManagerBundle\Entity\Committee $committee)
    {
        $this->committee = $committee;
    }

    /**
     * Get committee
     *
     * @return HomoDemocraticoSapiens\ComplaintManagerBundle\Entity\Committee $committee
     */
    public function getCommittee()
    {
        return $this->committee;
    }
}
