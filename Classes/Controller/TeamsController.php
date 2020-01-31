<?php
namespace Typo3graf\Stafflist\Controller;


use TYPO3\CMS\Core\Utility\GeneralUtility;/***
 * This file is part of the "Staff List" Extension for TYPO3 CMS.
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *  (c) 2020 Development-Team <development@typo3graf.de>, Typo3graf media-agentur
 ***/
/**
 * TeamsController
 */
class TeamsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * Inject a teams repository to enable DI
     *
     * @param \Typo3graf\Stafflist\Domain\Repository\TeamsRepository $teamsRepository
     */
    public function injectTeamsRepository(\Typo3graf\Stafflist\Domain\Repository\TeamsRepository $teamsRepository)
    {
        $this->teamsRepository = $teamsRepository;
    }


    /**
     * action teamList
     *
     * @return void
     */
    public function teamsListAction()
    {
        $teams = $this->teamsRepository->findDemanded(GeneralUtility::trimExplode(',',$this->settings['usergroup'], TRUE), $this->settings);

        $this->view->assign('teams', $teams);
    }

    /**
     * action groupedByTeams
     *
     * @return void
     */
    public function groupedByTeamsAction()
    {
        $teams = $this->teamsRepository->findAll();

        $this->view->assign('teams', $teams);
    }
}
