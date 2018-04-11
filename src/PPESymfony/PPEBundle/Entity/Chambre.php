<?php

namespace PPESymfony\PPEBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chambre
 *
 * @ORM\Table(name="chambre")
 * @ORM\Entity(repositoryClass="PPESymfony\PPEBundle\Repository\ChambreRepository")
 */
class Chambre
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
     * @ORM\Column(name="couleur", type="string", length=255)
     */
    private $couleur;


	/**
     * @var Service $leservice
     *
     * @ORM\ManyToOne(targetEntity="Service")
     */
    private $leservice;
	
	
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
     * Set couleur
     *
     * @param string $couleur
     * @return Chambre
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get couleur
     *
     * @return string 
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * Set leservice
     *
     * @param \PPESymfony\PPEBundle\Entity\Service $leservice
     * @return Chambre
     */
    public function setLeservice(\PPESymfony\PPEBundle\Entity\Service $leservice = null)
    {
        $this->leservice = $leservice;

        return $this;
    }

    /**
     * Get leservice
     *
     * @return \PPESymfony\PPEBundle\Entity\Service 
     */
    public function getLeservice()
    {
        return $this->leservice;
    }
	
	public function getLesInfos()
	{
		return $this->getId()." - ".$this->leservice->getLibelle();
	}
}
