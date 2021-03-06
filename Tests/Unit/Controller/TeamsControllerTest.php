<?php

namespace T3graf\Stafflist\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Development-Team <development@t3graf.de>
 */
class TeamsControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{

    /**
     * @var \T3graf\Stafflist\Controller\TeamsController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\T3graf\Stafflist\Controller\TeamsController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllTeamsFromRepositoryAndAssignsThemToView()
    {
 /*
        $allTeamss = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $teamsRepository = $this->getMockBuilder(\T3graf\Stafflist\Domain\Repository\TeamsRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $teamsRepository->expects(self::once())->method('findAll')->will(self::returnValue($allTeamss));
        $this->inject($this->subject, 'teamsRepository', $teamsRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('teamss', $allTeamss);
        $this->inject($this->subject, 'view', $view);

        // $this->subject->teamsListAction();
  */
    }
}
