<?php
namespace Typo3graf\Stafflist\Domain\Model;


/***
 *
 * This file is part of the "Staff List" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 Development-Team <development@typo3graf.de>, Typo3graf media-agentur
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
     * teamleaders
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Typo3graf\Stafflist\Domain\Model\Persons>
     */
    protected $teamleaders = null;

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
     * 
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->teamleaders = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the teamname
     * 
     * @return string $teamname
     */
    public function getTeamname()
    {
        return $this->teamname;
    }

    /**
     * Sets the teamname
     * 
     * @param string $teamname
     * @return void
     */
    public function setTeamname($teamname)
    {
        $this->teamname = $teamname;
    }

    /**
     * Returns the teampage
     * 
     * @return string $teampage
     */
    public function getTeampage()
    {
        return $this->teampage;
    }

    /**
     * Sets the teampage
     * 
     * @param string $teampage
     * @return void
     */
    public function setTeampage($teampage)
    {
        $this->teampage = $teampage;
    }

    /**
     * Adds a Persons
     * 
     * @param \Typo3graf\Stafflist\Domain\Model\Persons $teamleader
     * @return void
     */
    public function addTeamleader(\Typo3graf\Stafflist\Domain\Model\Persons $teamleader)
    {
        $this->teamleaders->attach($teamleader);
    }

    /**
     * Removes a Persons
     * 
     * @param \Typo3graf\Stafflist\Domain\Model\Persons $teamleaderToRemove The Persons to be removed
     * @return void
     */
    public function removeTeamleader(\Typo3graf\Stafflist\Domain\Model\Persons $teamleaderToRemove)
    {
        $this->teamleaders->detach($teamleaderToRemove);
    }

    /**
     * Returns the teamleaders
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Typo3graf\Stafflist\Domain\Model\Persons> $teamleaders
     */
    public function getTeamleaders()
    {
        return $this->teamleaders;
    }

    /**
     * Sets the teamleaders
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Typo3graf\Stafflist\Domain\Model\Persons> $teamleaders
     * @return void
     */
    public function setTeamleaders(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $teamleaders)
    {
        $this->teamleaders = $teamleaders;
    }
}
