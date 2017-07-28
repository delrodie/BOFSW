<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Difficulte
 *
 * @ORM\Table(name="difficulte")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DifficulteRepository")
 */
class Difficulte
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
     * @ORM\Column(name="Age_Classe", type="string", length=255, nullable=true)
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="MGA_Classe", type="string", length=255, nullable=true)
     */
    private $mga;

    /**
     * @var string
     *
     * @ORM\Column(name="DecisionFinAnnee_Classe", type="string", length=255, nullable=true)
     */
    private $decision;

    /**
     * @var string
     *
     * @ORM\Column(name="Dif_Allemand", type="string", length=255, nullable=true)
     */
    private $allemand;

    /**
     * @var string
     *
     * @ORM\Column(name="Dif_Anglais", type="string", length=255, nullable=true)
     */
    private $anglais;

    /**
     * @var string
     *
     * @ORM\Column(name="Dif_Autres", type="string", length=255, nullable=true)
     */
    private $autres;

    /**
     * @var string
     *
     * @ORM\Column(name="Dif_Calcul", type="string", length=255, nullable=true)
     */
    private $calcul;

    /**
     * @var string
     *
     * @ORM\Column(name="Dif_Dictee", type="string", length=255, nullable=true)
     */
    private $dictee;

    /**
     * @var string
     *
     * @ORM\Column(name="Dif_Espagnol", type="string", length=255, nullable=true)
     */
    private $espagnol;

    /**
     * @var string
     *
     * @ORM\Column(name="Dif_Francais", type="string", length=255, nullable=true)
     */
    private $francais;

    /**
     * @var string
     *
     * @ORM\Column(name="Dif_HG", type="string", length=255, nullable=true)
     */
    private $hg;

    /**
     * @var string
     *
     * @ORM\Column(name="Dif_Lecture", type="string", length=255, nullable=true)
     */
    private $lecture;

    /**
     * @var string
     *
     * @ORM\Column(name="Dif_Maths", type="string", length=255, nullable=true)
     */
    private $maths;

    /**
     * @var string
     *
     * @ORM\Column(name="Dif_Scolaire", type="string", length=255, nullable=true)
     */
    private $scolaire;

    /**
     * @var string
     *
     * @ORM\Column(name="Dif_SP", type="string", length=255, nullable=true)
     */
    private $sp;

    /**
     * @var string
     *
     * @ORM\Column(name="Dif_SVT", type="string", length=255, nullable=true)
     */
    private $svt;

    /**
     * @var string
     *
     * @ORM\Column(name="Rang", type="string", length=255, nullable=true)
     */
    private $rang;

    /**
     * @var string
     *
     * @ORM\Column(name="Observation", type="string", length=255, nullable=true)
     */
    private $observation;

    /**
     * @var string
     *
     * @ORM\Column(name="MGA_Total_Classe", type="string", length=255, nullable=true)
     */
    private $mgaTotalClasse;

   /**
    * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Resultat", inversedBy="difficultes")
    * @ORM\JoinColumn(name="resultat_id", referencedColumnName="id")
    */
    private $resultat;


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
     * Set age
     *
     * @param string $age
     *
     * @return Difficulte
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return string
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set mga
     *
     * @param string $mga
     *
     * @return Difficulte
     */
    public function setMga($mga)
    {
        $this->mga = $mga;

        return $this;
    }

    /**
     * Get mga
     *
     * @return string
     */
    public function getMga()
    {
        return $this->mga;
    }

    /**
     * Set decision
     *
     * @param string $decision
     *
     * @return Difficulte
     */
    public function setDecision($decision)
    {
        $this->decision = $decision;

        return $this;
    }

    /**
     * Get decision
     *
     * @return string
     */
    public function getDecision()
    {
        return $this->decision;
    }

    /**
     * Set allemand
     *
     * @param string $allemand
     *
     * @return Difficulte
     */
    public function setAllemand($allemand)
    {
        $this->allemand = $allemand;

        return $this;
    }

    /**
     * Get allemand
     *
     * @return string
     */
    public function getAllemand()
    {
        return $this->allemand;
    }

    /**
     * Set anglais
     *
     * @param string $anglais
     *
     * @return Difficulte
     */
    public function setAnglais($anglais)
    {
        $this->anglais = $anglais;

        return $this;
    }

    /**
     * Get anglais
     *
     * @return string
     */
    public function getAnglais()
    {
        return $this->anglais;
    }

    /**
     * Set autres
     *
     * @param string $autres
     *
     * @return Difficulte
     */
    public function setAutres($autres)
    {
        $this->autres = $autres;

        return $this;
    }

    /**
     * Get autres
     *
     * @return string
     */
    public function getAutres()
    {
        return $this->autres;
    }

    /**
     * Set calcul
     *
     * @param string $calcul
     *
     * @return Difficulte
     */
    public function setCalcul($calcul)
    {
        $this->calcul = $calcul;

        return $this;
    }

    /**
     * Get calcul
     *
     * @return string
     */
    public function getCalcul()
    {
        return $this->calcul;
    }

    /**
     * Set dictee
     *
     * @param string $dictee
     *
     * @return Difficulte
     */
    public function setDictee($dictee)
    {
        $this->dictee = $dictee;

        return $this;
    }

    /**
     * Get dictee
     *
     * @return string
     */
    public function getDictee()
    {
        return $this->dictee;
    }

    /**
     * Set espagnol
     *
     * @param string $espagnol
     *
     * @return Difficulte
     */
    public function setEspagnol($espagnol)
    {
        $this->espagnol = $espagnol;

        return $this;
    }

    /**
     * Get espagnol
     *
     * @return string
     */
    public function getEspagnol()
    {
        return $this->espagnol;
    }

    /**
     * Set francais
     *
     * @param string $francais
     *
     * @return Difficulte
     */
    public function setFrancais($francais)
    {
        $this->francais = $francais;

        return $this;
    }

    /**
     * Get francais
     *
     * @return string
     */
    public function getFrancais()
    {
        return $this->francais;
    }

    /**
     * Set hg
     *
     * @param string $hg
     *
     * @return Difficulte
     */
    public function setHg($hg)
    {
        $this->hg = $hg;

        return $this;
    }

    /**
     * Get hg
     *
     * @return string
     */
    public function getHg()
    {
        return $this->hg;
    }

    /**
     * Set lecture
     *
     * @param string $lecture
     *
     * @return Difficulte
     */
    public function setLecture($lecture)
    {
        $this->lecture = $lecture;

        return $this;
    }

    /**
     * Get lecture
     *
     * @return string
     */
    public function getLecture()
    {
        return $this->lecture;
    }

    /**
     * Set maths
     *
     * @param string $maths
     *
     * @return Difficulte
     */
    public function setMaths($maths)
    {
        $this->maths = $maths;

        return $this;
    }

    /**
     * Get maths
     *
     * @return string
     */
    public function getMaths()
    {
        return $this->maths;
    }

    /**
     * Set scolaire
     *
     * @param string $scolaire
     *
     * @return Difficulte
     */
    public function setScolaire($scolaire)
    {
        $this->scolaire = $scolaire;

        return $this;
    }

    /**
     * Get scolaire
     *
     * @return string
     */
    public function getScolaire()
    {
        return $this->scolaire;
    }

    /**
     * Set sp
     *
     * @param string $sp
     *
     * @return Difficulte
     */
    public function setSp($sp)
    {
        $this->sp = $sp;

        return $this;
    }

    /**
     * Get sp
     *
     * @return string
     */
    public function getSp()
    {
        return $this->sp;
    }

    /**
     * Set svt
     *
     * @param string $svt
     *
     * @return Difficulte
     */
    public function setSvt($svt)
    {
        $this->svt = $svt;

        return $this;
    }

    /**
     * Get svt
     *
     * @return string
     */
    public function getSvt()
    {
        return $this->svt;
    }

    /**
     * Set rang
     *
     * @param string $rang
     *
     * @return Difficulte
     */
    public function setRang($rang)
    {
        $this->rang = $rang;

        return $this;
    }

    /**
     * Get rang
     *
     * @return string
     */
    public function getRang()
    {
        return $this->rang;
    }

    /**
     * Set observation
     *
     * @param string $observation
     *
     * @return Difficulte
     */
    public function setObservation($observation)
    {
        $this->observation = $observation;

        return $this;
    }

    /**
     * Get observation
     *
     * @return string
     */
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * Set mgaTotalClasse
     *
     * @param string $mgaTotalClasse
     *
     * @return Difficulte
     */
    public function setMgaTotalClasse($mgaTotalClasse)
    {
        $this->mgaTotalClasse = $mgaTotalClasse;

        return $this;
    }

    /**
     * Get mgaTotalClasse
     *
     * @return string
     */
    public function getMgaTotalClasse()
    {
        return $this->mgaTotalClasse;
    }

    /**
     * Set resultat
     *
     * @param \AppBundle\Entity\Resultat $resultat
     *
     * @return Difficulte
     */
    public function setResultat(\AppBundle\Entity\Resultat $resultat = null)
    {
        $this->resultat = $resultat;

        return $this;
    }

    /**
     * Get resultat
     *
     * @return \AppBundle\Entity\Resultat
     */
    public function getResultat()
    {
        return $this->resultat;
    }
}
