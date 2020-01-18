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
 * PersonsController
 */
class PersonsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * personsRepository
     * 
     * @var \Typo3graf\Stafflist\Domain\Repository\PersonsRepository
     * @inject
     */
    protected $personsRepository = null;

    /**
     * action personList
     * 
     * @return void
     */
    public function personListAction()
    {
     $persons = $this->personsRepository->findAll();
        $this->view->assign('persons', $persons);
    }

    /**
     * action groupedByList
     * 
     * @return void
     */
    public function groupedByListAction()
    {
    }

    /**
     * action detailView
     * 
     * @return void
     */
    public function detailViewAction()
    {
    }

    /**
     * action boxView
     * 
     * @return void
     */
    public function boxViewAction()
    {
    }
}
