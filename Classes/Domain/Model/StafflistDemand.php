<?php
namespace T3graf\Stafflist\Domain\Model;

/***
 * This file is part of the "Staff List" Extension for TYPO3 CMS.
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 *  (c) 2020 Development-Team <development@t3graf.de>, T3graf media-agentur
 ***/

use TYPO3\CMS\Extbase\DomainObject\AbstractValueObject;

/**
 * News Demand object which holds all information to get the correct news records.
 */
class StafflistDemand extends AbstractValueObject
{
    /** @var array */
    protected $teams;

    /** @var array */
    protected $persons;

    /** @var string */
    protected $order;

    /** @var string */
    protected $action;

    /** @var int */
    protected $storagePage;

    /**
     * List of allowed teams
     *
     * @param array $teams teams
     * @return StafflistDemand
     */
    public function setTeams($teams)
    {
        $this->teams = $teams;
        return $this;
    }

    /**
     * Get allowed teams
     *
     * @return array
     */
    public function getTeams()
    {
        return $this->teams;
    }

    /**
     * List of allowed persons
     *
     * @param array $persons persons
     * @return StafflistDemand
     */
    public function setPersons($persons)
    {
        $this->persons = $persons;
        return $this;
    }

    /**
     * Get allowed persons
     *
     * @return array
     */
    public function getPersons()
    {
        return $this->persons;
    }

    /**
     * Set order
     *
     * @param string $order order
     * @return StafflistDemand
     */
    public function setOrder($order)
    {
        $this->order = $order;
        return $this;
    }

    /**
     * Get order
     *
     * @return string
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set action
     *
     * @param string $action action
     * @return StafflistDemand
     */
    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }

    /**
     * Get action
     *
     * @return string
     */
    public function getaction()
    {
        return $this->action;
    }

    /**
     * Set team order
     *
     * @param string $order order
     * @return StafflistDemand
     */
    public function setTeamOrder($order)
    {
        $this->order = $order;
        return $this;
    }

    /**
     * Get order
     *
     * @return string
     */
    public function getTeamOrder()
    {
        return $this->order;
    }

    /**
     * Set list of storage pages
     *
     * @param string $storagePage storage page list
     * @return StafflistDemand
     */
    public function setStoragePage($storagePage)
    {
        $this->storagePage = $storagePage;
        return $this;
    }

    /**
     * Get list of storage pages
     *
     * @return string
     */
    public function getStoragePage()
    {
        return $this->storagePage;
    }
}
