<?php

namespace T3graf\Stafflist\Domain\Model;

/***
 * This file is part of the "Staff List" Extension for TYPO3 CMS.
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 *  (c) 2020 Development-Team <development@t3graf.de>, T3graf media-agentur
 ***/

/**
 * Persons
 */
class Persons extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * lastname
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $lastname = '';

    /**
     * firstname
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $firstname = '';

    /**
     * title
     * @var string
     */
    protected $title = '';

    /**
     * salutation
     * @var int
     */
    protected $salutation = 0;

    /**
     * avatar
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $avatar = null;

    /**
     * function
     * @var string
     */
    protected $function = '';

    /**
     * tasks
     * @var string
     */
    protected $tasks = '';

    /**
     * incompany
     * @var \DateTime
     */
    protected $incompany = null;

    /**
     * building
     * @var string
     */
    protected $building = '';

    /**
     * room
     * @var string
     */
    protected $room = '';

    /**
     * phone
     * @var string
     */
    protected $phone = '';

    /**
     * mobile
     * @var string
     */
    protected $mobile = '';

    /**
     * fax
     * @var string
     */
    protected $fax = '';

    /**
     * email
     * @var string
     */
    protected $email = '';

    /**
     * officehours
     * @var string
     */
    protected $officehours = '';

    /**
     * bio
     * @var string
     */
    protected $bio = '';

    /**
     * twitter
     * @var string
     */
    protected $twitter = '';

    /**
     * facebook
     * @var string
     */
    protected $facebook = '';

    /**
     * instagram
     * @var string
     */
    protected $instagram = '';

    /**
     * xing
     *
     * @var string
     */
    protected $xing = '';

    /**
     * github
     *
     * @var string
     */
    protected $github = '';

    /**
     * gitlab
     *
     * @var string
     */
    protected $gitlab = '';

    /**
     * teams
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\T3graf\Stafflist\Domain\Model\Teams>
     */
    protected $teams = null;

    /**
     * Repetitive functions
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\T3graf\Stafflist\Domain\Model\Functions>
     */
    protected $functions = null;

    /**
     * locations
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\T3graf\Stafflist\Domain\Model\Locations>
     */
    protected $locations = null;

    /**
     * @var string
     */
    protected $startingpoint;

    /**
     * __construct
     */
    public function __construct()
    {

        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     */
    protected function initStorageObjects()
    {
        $this->teams = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->functions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->locations = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the lastname

     * @return string $lastname
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Sets the lastname

     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * Returns the firstname

     * @return string $firstname
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Sets the firstname
     *
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the salutation
     *
     * @return int $salutation
     */
    public function getSalutation()
    {
        return $this->salutation;
    }

    /**
     * Sets the salutation
     *
     * @param int $salutation
     */
    public function setSalutation($salutation)
    {
        $this->salutation = $salutation;
    }

    /**
     * Returns the avatar
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $avatar
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Sets the avatar
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $avatar
     */
    public function setAvatar(\TYPO3\CMS\Extbase\Domain\Model\FileReference $avatar)
    {
        $this->avatar = $avatar;
    }

    /**
     * Returns the function
     *
     * @return string $function
     */
    public function getFunction()
    {
        return $this->function;
    }

    /**
     * Sets the function
     *
     * @param string $function
     */
    public function setFunction($function)
    {
        $this->function = $function;
    }

    /**
     * Returns the tasks
     *
     * @return string $tasks
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * Sets the tasks
     *
     * @param string $tasks
     */
    public function setTasks($tasks)
    {
        $this->tasks = $tasks;
    }

    /**
     * Returns the incompany
     *
     * @return \DateTime $incompany
     */
    public function getIncompany()
    {
        return $this->incompany;
    }

    /**
     * Sets the incompany
     *
     * @param \DateTime $incompany
     */
    public function setIncompany(\DateTime $incompany)
    {
        $this->incompany = $incompany;
    }

    /**
     * Returns the building
     *
     * @return string $building
     */
    public function getBuilding()
    {
        return $this->building;
    }

    /**
     * Sets the building
     *
     * @param string $building
     */
    public function setBuilding($building)
    {
        $this->building = $building;
    }

    /**
     * Returns the room
     *
     * @return string $room
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * Sets the room
     *
     * @param string $room
     */
    public function setRoom($room)
    {
        $this->room = $room;
    }

    /**
     * Returns the phone
     *
     * @return string $phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Sets the phone
     *
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * Returns the mobile
     *
     * @return string $mobile
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Sets the mobile
     *
     * @param string $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    /**
     * Returns the email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Returns the officehours
     *
     * @return string $officehours
     */
    public function getOfficehours()
    {
        return $this->officehours;
    }

    /**
     * Sets the officehours
     *
     * @param string $officehours
     */
    public function setOfficehours($officehours)
    {
        $this->officehours = $officehours;
    }

    /**
     * Returns the bio
     *
     * @return string $bio
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * Sets the bio
     *
     * @param string $bio
     */
    public function setBio($bio)
    {
        $this->bio = $bio;
    }

    /**
     * Returns the twitter
     *
     * @return string $twitter
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Sets the twitter
     *
     * @param string $twitter
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;
    }

    /**
     * Returns the facebook
     *
     * @return string $facebook
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Sets the facebook
     *
     * @param string $facebook
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    }

    /**
     * Returns the instagram
     *
     * @return string $instagram
     */
    public function getInstagram()
    {
        return $this->instagram;
    }

    /**
     * Sets the instagram
     *
     * @param string $instagram
     */
    public function setInstagram($instagram)
    {
        $this->instagram = $instagram;
    }

    /**
     * Returns the xing
     *
     * @return string $xing
     */
    public function getXing()
    {
        return $this->xing;
    }

    /**
     * Sets the xing
     *
     * @param string $xing
     */
    public function setXing($xing)
    {
        $this->xing = $xing;
    }

    /**
     * Returns the github
     *
     * @return string $github
     */
    public function getGithub()
    {
        return $this->github;
    }

    /**
     * Sets the github
     *
     * @param string $github
     */
    public function setGithub($github)
    {
        $this->github = $github;
    }

    /**
     * Returns the gitlab
     *
     * @return string $gitlab
     */
    public function getGitlab()
    {
        return $this->gitlab;
    }

    /**
     * Sets the gitlab
     *
     * @param string $gitlab
     */
    public function setGitlab($gitlab)
    {
        $this->gitlab = $gitlab;
    }

    /**
     * Adds a Teams
     *
     * @param \T3graf\Stafflist\Domain\Model\Teams $team
     */
    public function addTeam(\T3graf\Stafflist\Domain\Model\Teams $team)
    {
        $this->teams->attach($team);
    }

    /**
     * Removes a Teams
     *
     * @param \T3graf\Stafflist\Domain\Model\Teams $teamToRemove The Teams to be removed
     */
    public function removeTeam(\T3graf\Stafflist\Domain\Model\Teams $teamToRemove)
    {
        $this->teams->detach($teamToRemove);
    }

    /**
     * Returns the teams
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\T3graf\Stafflist\Domain\Model\Teams> $teams
     */
    public function getTeams()
    {
        return $this->teams;
    }

    /**
     * Sets the teams
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\T3graf\Stafflist\Domain\Model\Teams> $teams
     */
    public function setTeams(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $teams)
    {
        $this->teams = $teams;
    }

    /**
     * Adds a Functions
     *
     * @param \T3graf\Stafflist\Domain\Model\Functions $function
     */
    public function addFunction(\T3graf\Stafflist\Domain\Model\Functions $function)
    {
        $this->functions->attach($function);
    }

    /**
     * Removes a Functions
     *
     * @param \T3graf\Stafflist\Domain\Model\Functions $functionToRemove The Functions to be removed
     */
    public function removeFunction(\T3graf\Stafflist\Domain\Model\Functions $functionToRemove)
    {
        $this->functions->detach($functionToRemove);
    }

    /**
     * Returns the functions
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\T3graf\Stafflist\Domain\Model\Functions> $functions
     */
    public function getFunctions()
    {
        return $this->functions;
    }

    /**
     * Sets the functions
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\T3graf\Stafflist\Domain\Model\Functions> $functions
     */
    public function setFunctions(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $functions)
    {
        $this->functions = $functions;
    }

    /**
     * Adds a Locations
     *
     * @param \T3graf\Stafflist\Domain\Model\Locations $location
     */
    public function addLocation(\T3graf\Stafflist\Domain\Model\Locations $location)
    {
        $this->locations->attach($location);
    }

    /**
     * Removes a Locations
     *
     * @param \T3graf\Stafflist\Domain\Model\Locations $locationToRemove The Locations to be removed
     */
    public function removeLocation(\T3graf\Stafflist\Domain\Model\Locations $locationToRemove)
    {
        $this->locations->detach($locationToRemove);
    }

    /**
     * Returns the locations
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\T3graf\Stafflist\Domain\Model\Locations> $locations
     */
    public function getLocations()
    {
        return $this->locations;
    }

    /**
     * Sets the locations
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\T3graf\Stafflist\Domain\Model\Locations> $locations
     */
    public function setLocations(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $locations)
    {
        $this->locations = $locations;
    }

    /**
     * Returns the fax
     *
     * @return string $fax
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Sets the fax
     *
     * @param string $fax
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    }
}
