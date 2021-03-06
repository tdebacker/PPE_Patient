<?php

namespace PPESymfony\PPEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sejour
 *
 * @ORM\Table(name="sejour")
 * @ORM\Entity(repositoryClass="PPESymfony\PPEBundle\Repository\SejourRepository")
 */
class Sejour
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
     * @var \DateTime
     *
     * @ORM\Column(name="DateDepart", type="date")
     */
    private $dateDepart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateFin", type="date")
     */
    private $dateFin;


	/**
    *@var Patient $lepatient
    *@ORM\ManyToOne(targetEntity="Patient")
    */
    private $lepatient;
	
	
	/**
     * @var Chambre $lachambre
	 *
	 *@ORM\ManyToOne(targetEntity="Chambre")
     */
    private $lachambre;
	
	

	/**
	 *
	 * @var int
	 *
	 *@ORM\Column(name="numLit", type="integer")
     */
    private $numLit;
	
	/**
     * @var boolean
     *
     * @ORM\Column(name="estEntre", type="boolean")
     */
    private $estEntre;
	
	/**
     * @var boolean
     *
     * @ORM\Column(name="estSortie", type="boolean")
     */
    private $estSortie;
	
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
     * Set dateDepart
     *
     * @param \DateTime $dateDepart
     * @return Sejour
     */
    public function setDateDepart($dateDepart)
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }

    /**
     * Get dateDepart
     *
     * @return \DateTime 
     */
    public function getDateDepart()
    {
        return $this->dateDepart;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     * @return Sejour
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime 
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set lepatient
     *
     * @param \PPESymfony\PPEBundle\Entity\Patient $lepatient
     * @return Sejour
     */
    public function setLepatient(\PPESymfony\PPEBundle\Entity\Patient $lepatient = null)
    {
        $this->lepatient = $lepatient;
    
        return $this;
    }

    /**
     * Get lepatient
     *
     * @return \PPESymfony\PPEBundle\Entity\Patient 
     */
    public function getLepatient()
    {
        return $this->lepatient;
    }
	
	
	/**
     * Set lachambre
     *
     * @param \PPESymfony\PPEBundle\Entity\Chambre $lachambre
     * @return Sejour
     */
    public function setLachambre(\PPESymfony\PPEBundle\Entity\Chambre $lachambre = null)
    {
        $this->lachambre = $lachambre;

        return $this;
    }

    /**
     * Get lachambre
     *
     * @return \PPESymfony\PPEBundle\Entity\Chambre 
     */
    public function getLachambre()
    {
        return $this->lachambre;
    }


    /**
     * Set numLit
     *
     * @param integer $numLit
     * @return Sejour
     */
    public function setNumLit($numLit)
    {
        $this->numLit = $numLit;
    
        return $this;
    }

    /**
     * Get numLit
     *
     * @return integer 
     */
    public function getNumLit()
    {
        return $this->numLit;
    }
	

	

    /**
     * Set estEntre
     *
     * @param boolean $estEntre
     *
     * @return Sejour
     */
    public function setEstEntre($estEntre)
    {
        $this->estEntre = $estEntre;

        return $this;
    }

    /**
     * Get estEntre
     *
     * @return boolean
     */
    public function getEstEntre()
    {
        return $this->estEntre;
    }

    /**
     * Set estSortie
     *
     * @param boolean $estSortie
     *
     * @return Sejour
     */
    public function setEstSortie($estSortie)
    {
        $this->estSortie = $estSortie;

        return $this;
    }

    /**
     * Get estSortie
     *
     * @return boolean
     */
    public function getEstSortie()
    {
        return $this->estSortie;
    }
}
