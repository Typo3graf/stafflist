<?php
namespace Typo3graf\Stafflist\Controller;


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
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $teams = $this->teamsRepository->findAll();
        $this->view->assign('teams', $teams);
    }

    /**
     * action teamList
     *
     * @return void
     */
    public function teamListAction()
    {
    }
}
