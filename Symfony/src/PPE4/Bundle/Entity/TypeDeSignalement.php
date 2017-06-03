<?php
// by Rémi H. and Thomas S.

namespace PPE4\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeDeSignalement
 *
 * @ORM\Table(name="type_de_signalement")
 * @ORM\Entity(repositoryClass="PPE4\Bundle\Repository\TypeDeSignalementRepository")
 */
class TypeDeSignalement
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
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;


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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return TypeDeSignalement
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    public function __toString()
    {
        return $this->libelle;
    }
}
