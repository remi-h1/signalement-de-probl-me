<?php
// by Rémi H. and Thomas S.

namespace PPE4\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Signalement
 *
 * @ORM\Table(name="signalement")
 * @ORM\Entity(repositoryClass="PPE4\Bundle\Repository\SignalementRepository")
 */
class Signalement
{

    /**
     *
     * @ORM\ManyToOne(targetEntity="PPE4\Bundle\Entity\Administre")
     * @ORM\JoinColumn(nullable=false)
     */

    private $administre;

    /**
     *
     * @ORM\ManyToOne(targetEntity="PPE4\Bundle\Entity\TypeDeSignalement")
     * @ORM\JoinColumn(nullable=false)
     */

    private $typeDeSignalement;

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
     * @ORM\Column(name="objet", type="string", length=255)
     */
    private $objet;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureDate", type="datetime")
     */
    private $heureDate;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude", type="string", length=255)
     */
    private $longitude;

    /**
     * @var string
     *
     * @ORM\Column(name="latitude", type="string", length=255)
     */
    private $latitude;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;


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
     * Set objet
     *
     * @param string $objet
     *
     * @return Signalement
     */
    public function setObjet($objet)
    {
        $this->objet = $objet;

        return $this;
    }

    /**
     * Get objet
     *
     * @return string
     */
    public function getObjet()
    {
        return $this->objet;
    }

    /**
     * Set heureDate
     *
     * @param \DateTime $heureDate
     *
     * @return Signalement
     */
    public function setHeureDate($heureDate)
    {
        $this->heureDate = $heureDate;

        return $this;
    }

    /**
     * Get heureDate
     *
     * @return \DateTime
     */
    public function getHeureDate()
    {
        return $this->heureDate;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     *
     * @return Signalement
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     *
     * @return Signalement
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Signalement
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set administre
     *
     * @param \PPE4\Bundle\Entity\Administre $administre
     *
     * @return Signalement
     */
    public function setAdministre(\PPE4\Bundle\Entity\Administre $administre)
    {
        $this->administre = $administre;

        return $this;
    }

    /**
     * Get administre
     *
     * @return \PPE4\Bundle\Entity\Administre
     */
    public function getAdministre()
    {
        return $this->administre;
    }

    /**
     * Set typeDeSignalement
     *
     * @param \PPE4\Bundle\Entity\TypeDeSignalement $typeDeSignalement
     *
     * @return Signalement
     */
    public function setTypeDeSignalement(\PPE4\Bundle\Entity\TypeDeSignalement $typeDeSignalement)
    {
        $this->typeDeSignalement = $typeDeSignalement;

        return $this;
    }

    /**
     * Get typeDeSignalement
     *
     * @return \PPE4\Bundle\Entity\TypeDeSignalement
     */
    public function getTypeDeSignalement()
    {
        return $this->typeDeSignalement;
    }


}
