<?php

namespace PPESymfony\PPEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PPESymfony\PPEBundle\Entity\Sejour;
use PPESymfony\PPEBundle\Entity\Ville;

/**
 * Patient
 *
 * @ORM\Table(name="patient")
 * @ORM\Entity(repositoryClass="PPESymfony\PPEBundle\Repository\PatientRepository")
 */
class Patient
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
     * @ORM\Column(name="num_secu", type="string", length=30)
     */
    private $numSecu;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaiss", type="datetime")
     */
    private $dateNaiss;

    /**
     * @var string
     *
     * @ORM\Column(name="AdrNum", type="string", length=255)
     */
    private $adrNum;

    /**
     * @var string
     *
     * @ORM\Column(name="AdrRue", type="string", length=255)
     */
    private $adrRue;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255)
     */
    private $mail;

	/**
     * @var boolean
     *
     * @ORM\Column(name="estAssuree", type="boolean")
     */
    private $estAssuree;
	
	
		 

	/**
     *
     * @ORM\ManyToOne(targetEntity="Ville", inversedBy="patient")
     */
    private $ville ;
	
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
     * Set numSecu
     *
     * @param string $numSecu
     * @return Patient
     */
    public function setNumSecu($numSecu)
    {
        $this->numSecu = $numSecu;
    
        return $this;
    }

    /**
     * Get numSecu
     *
     * @return string 
     */
    public function getNumSecu()
    {
        return $this->numSecu;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Patient
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Patient
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    
        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set dateNaiss
     *
     * @param \DateTime $dateNaiss
     * @return Patient
     */
    public function setDateNaiss($dateNaiss)
    {
        $this->dateNaiss = $dateNaiss;
    
        return $this;
    }

    /**
     * Get dateNaiss
     *
     * @return \DateTime 
     */
    public function getDateNaiss()
    {
        return $this->dateNaiss;
    }

    /**
     * Set adrNum
     *
     * @param string $adrNum
     * @return Patient
     */
    public function setAdrNum($adrNum)
    {
        $this->adrNum = $adrNum;
    
        return $this;
    }

    /**
     * Get adrNum
     *
     * @return string 
     */
    public function getAdrNum()
    {
        return $this->adrNum;
    }

    /**
     * Set adrRue
     *
     * @param string $adrRue
     * @return Patient
     */
    public function setAdrRue($adrRue)
    {
        $this->adrRue = $adrRue;
    
        return $this;
    }

    /**
     * Get adrRue
     *
     * @return string 
     */
    public function getAdrRue()
    {
        return $this->adrRue;
    }

    /**
     * Set mail
     *
     * @param string $mail
     * @return Patient
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    
        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set estAssuree
     *
     * @param boolean $estAssuree
     * @return Patient
     */
    public function setEstAssuree($estAssuree)
    {
        $this->estAssuree = $estAssuree;
    
        return $this;
    }

    /**
     * Get estAssuree
     *
     * @return boolean 
     */
    public function getEstAssuree()
    {
        return $this->estAssuree;
    }

    /**
     * Set ville
     *
     * @param \PPESymfony\PPEBundle\Entity\Ville $ville
     * @return Patient
     */
    public function setVille(\PPESymfony\PPEBundle\Entity\Ville $ville = null)
    {
        $this->ville = $ville;
    
        return $this;
    }

    /**
     * Get ville
     *
     * @return \PPESymfony\PPEBundle\Entity\Ville 
     */
    public function getVille()
    {
        return $this->ville;
    }

}
