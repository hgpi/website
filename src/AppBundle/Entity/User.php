<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping\AttributeOverrides;
use Doctrine\ORM\Mapping\AttributeOverride;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
     * @ORM\OneToOne(targetEntity="Image", mappedBy="user")
     */
    protected $image;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $profilIsPublic = true;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $newsletter;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @Assert\Length(
     *     min=3,
     *     max=255
     * )
     */
    protected $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\Length(
     *     min=3,
     *     max=255
     * )
     */
    protected $career;

    /**
     * @ORM\Column(type="integer", length=255, nullable=true)
     *
     * @Assert\Length(
     *     min=5,
     *     max=5
     * )
     */
    protected $cp;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @Assert\Length(
     *     max=55
     * )
     */
    protected $ville;

    /**
     * @ORM\Column(type="integer", length=255, nullable=true)
     *
     * @Assert\Length(
     *     min=9,
     *     max=9
     * )
     */
    protected $phone;

    /**
     * @ORM\Column(type="text", length=255, nullable=true)
     *
     * @Assert\Length(
     *     max=500
     * )
     */
    protected $bio;

    /**
     * @ORM\Column(type="date", length=255, nullable=true)
     *
     */
    protected $birthday;

    /**
     * One Customer has One Cart.
     * @ORM\OneToOne(targetEntity="Cv", mappedBy="user")
     */
    protected $cv;

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

    /**
     * @return mixed
     */
    public function getNewsletter()
    {
        return $this->newsletter;
    }

    /**
     * @param mixed $newsletter
     */
    public function setNewsletter($newsletter)
    {
        $this->newsletter = $newsletter;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getCareer()
    {
        return $this->career;
    }

    /**
     * @param mixed $career
     */
    public function setCareer($career)
    {
        $this->career = $career;
    }

    /**
     * @return mixed
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * @param mixed $bio
     */
    public function setBio($bio)
    {
        $this->bio = $bio;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param mixed $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    /**
     * @return mixed
     */
    public function getCv()
    {
        return $this->cv;
    }

    /**
     * @param mixed $cv
     */
    public function setCv($cv)
    {
        $this->cv = $cv;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }



}

