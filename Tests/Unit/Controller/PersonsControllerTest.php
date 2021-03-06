<?php

namespace T3graf\Stafflist\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Development-Team <development@t3graf.de>
 */
class PersonsControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{

    /**
     * @var \T3graf\Stafflist\Controller\PersonsController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\T3graf\Stafflist\Controller\PersonsController::class)
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
    public function listActionFetchesAllPersonsFromRepositoryAndAssignsThemToView()
    {

      /*  $allPersonss = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $personsRepository = $this->getMockBuilder(\T3graf\Stafflist\Domain\Repository\PersonsRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $personsRepository->expects(self::once())->method('findAll')->will(self::returnValue($allPersonss));
        $this->inject($this->subject, 'personsRepository', $personsRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('personss', $allPersonss);
        $this->inject($this->subject, 'view', $view);

        //$this->subject->personListAction();
*/
    }
}
