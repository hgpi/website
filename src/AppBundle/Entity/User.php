<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping\AttributeOverrides;
use Doctrine\ORM\Mapping\AttributeOverride;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 *
 *  @AttributeOverrides({
 *     @AttributeOverride(name="username",
 *         column=@ORM\Column(
 *             name="username",
 *             type="string",
 *             length=255,
 *             nullable=true
 *         )
 *     ),
 *     @AttributeOverride(name="usernameCanonical",
 *         column=@ORM\Column(
 *             name="usernameCanonical",
 *             type="string",
 *             length=255,
 *             nullable=true
 *         )
 *     ),
 * })
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min=3,
     *     max=255
     * )
     */
    protected $nom;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min=3,
     *     max=255
     * )
     */
    protected $prenom;

    /**
     * @Assert\Image(
     *     minWidth = 200,
     *     minHeight = 200
     * )
     */
    protected $photo;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $photoIsPublic = true;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $profilIsPublic = true;


    public function __construct()
    {
        parent::__construct();
    }

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
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function setEmail($email){
        parent::setEmail($email);
        $this->setUsername($email);
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return mixed
     */
    public function getPhotoIsPublic()
    {
        return $this->photoIsPublic;
    }

    /**
     * @param mixed $photoIsPublic
     */
    public function setPhotoIsPublic($photoIsPublic)
    {
        $this->photoIsPublic = $photoIsPublic;
    }

    /**
     * @return mixed
     */
    public function getProfilIsPublic()
    {
        return $this->profilIsPublic;
    }

    /**
     * @param mixed $profilIsPublic
     */
    public function setProfilIsPublic($profilIsPublic)
    {
        $this->profilIsPublic = $profilIsPublic;
    }


}

