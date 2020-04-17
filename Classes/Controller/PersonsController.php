<?php

namespace T3graf\Stafflist\Controller;

/***
 * This file is part of the "Staff List" Extension for TYPO3 CMS.
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 *  (c) 2020 Development-Team <development@t3graf.de>, T3graf media-agentur
 ***/

/**
 * PersonsController
 */

use T3graf\Stafflist\Domain\Model\Persons;

class PersonsController extends BaseController
{
    /**
     * personsRepository
     *
     * @var \T3graf\Stafflist\Domain\Repository\PersonsRepository
     */
    protected $personsRepository;

    /**
     * Inject a persons repository to enable DI
     *
     * @param \T3graf\Stafflist\Domain\Repository\PersonsRepository $personsRepository
     */
    public function injectPersonsRepository(\T3graf\Stafflist\Domain\Repository\PersonsRepository $personsRepository)
    {
        $this->personsRepository = $personsRepository;
    }

    /**
     * action personList
     *
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
     */
    public function personListAction()
    {
        $this->settings['sortTeamOrder'] = '';
        $demand = $this->createDemandObjectFromSettings($this->settings, 'list');
        $persons = $this->personsRepository->findDemanded($demand);
        $this->view->assign('persons', $persons);
    }

    /**
     * action detailView
     *
     * @param Persons $persons
     */
    public function detailViewAction(Persons $persons = null)
    {
        $this->view->assign('person-item', $persons);
    }

    /**
     * action boxView
     *
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
     */
    public function boxViewAction()
    {
            $demand = $this->createDemandObjectFromSettings($this->settings, 'persons');
            $persons = $this->personsRepository->findDemanded($demand);

        $this->view->assign('persons', $persons);
    }
}
