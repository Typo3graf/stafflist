<?php

namespace T3graf\Stafflist\Controller;

/***
 * This file is part of the "Staff List" Extension for TYPO3 CMS.
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 *  (c) 2020 Development-Team <development@t3graf.de>, T3graf media-agentur
 ***/

use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;

/**
 * TeamsController
 */
class TeamsController extends BaseController
{
    /**
     * @var ConfigurationManagerInterface
     */
    protected $configurationManager;

    /**
     * teamsRepository
     *
     * @var \T3graf\Stafflist\Domain\Repository\TeamsRepository
     */
    protected $teamsRepository;

    /**
     * Inject a teams repository to enable DI
     *
     * @param \T3graf\Stafflist\Domain\Repository\TeamsRepository $teamsRepository
     */
    public function injectTeamsRepository(\T3graf\Stafflist\Domain\Repository\TeamsRepository $teamsRepository)
    {
        $this->teamsRepository = $teamsRepository;
    }

    /**
     * action teamList
     */
    public function teamsListAction()
    {
        $this->settings['sortOrder'] = '';
        $demand = $this->createDemandObjectFromSettings($this->settings, 'team');
        $teams = $this->teamsRepository->findDemanded($demand);

        $this->view->assign('teams', $teams);
    }

    /**
     * action groupedByTeams
     */
    public function groupedByTeamsAction()
    {
        $this->settings['sortOrder'] = '';
        $demand = $this->createDemandObjectFromSettings($this->settings, 'team');
        $teams = $this->teamsRepository->findDemanded($demand);

        $this->view->assign('teams', $teams);
    }


}
