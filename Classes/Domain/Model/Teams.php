<?php
namespace T3graf\Stafflist\Domain\Model;

/***
 *
 * This file is part of the "Staff List" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 *
 *  (c) 2020 Development-Team <development@t3graf.de>, T3graf media-agentur
 *
 ***/
/**
 * Teams
 */
class Teams extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * teamname
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $teamname = '';

    /**
     * teampage
     *
     * @var string
     */
    protected $teampage = '';

    /**
     * persons
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\T3graf\Stafflist\Domain\Model\Persons>
     */
    protected $persons = null;

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
        $this->persons = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the teamname
     * @return string $teamname
     */
    public function getTeamname()
    {
        return $this->teamname;
    }

    /**
     * Sets the teamname
     * @param string $teamname
     */
    public function setTeamname($teamname)
    {
        $this->teamname = $teamname;
    }

    /**
     * Returns the teampage
     * @return string $teampage
     */
    public function getTeampage()
    {
        return $this->teampage;
    }

    /**
     * Sets the teampage
     * @param string $teampage
     */
    public function setTeampage($teampage)
    {
        $this->teampage = $teampage;
    }

    /**
     * Adds a Persons
     * @param \T3graf\Stafflist\Domain\Model\Persons $person
     */
    public function addPerson(\T3graf\Stafflist\Domain\Model\Persons $person)
    {
        $this->persons->attach($person);
    }

    /**
     * Removes a Person
     * @param \T3graf\Stafflist\Domain\Model\Persons $personToRemove The Persons to be removed
     */
    public function removePerson(\T3graf\Stafflist\Domain\Model\Persons $personToRemove)
    {
        $this->persons->detach($personToRemove);
    }

    /**
     * Returns the persons
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\T3graf\Stafflist\Domain\Model\Persons> $persons
     */
    public function getPersons()
    {
        return $this->persons;
    }

    /**
     * Sets the persons
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\T3graf\Stafflist\Domain\Model\Persons> $persons
     */
    public function setPersons(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $persons)
    {
        $this->persons = $persons;
    }
}
