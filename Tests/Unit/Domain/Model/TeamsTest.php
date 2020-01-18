<?php
namespace Typo3graf\Stafflist\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Development-Team <development@typo3graf.de>
 */
class TeamsTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Typo3graf\Stafflist\Domain\Model\Teams
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Typo3graf\Stafflist\Domain\Model\Teams();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTeamnameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTeamname()
        );
    }

    /**
     * @test
     */
    public function setTeamnameForStringSetsTeamname()
    {
        $this->subject->setTeamname('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'teamname',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTeampageReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTeampage()
        );
    }

    /**
     * @test
     */
    public function setTeampageForStringSetsTeampage()
    {
        $this->subject->setTeampage('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'teampage',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTeamleadersReturnsInitialValueForPersons()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getTeamleaders()
        );
    }

    /**
     * @test
     */
    public function setTeamleadersForObjectStorageContainingPersonsSetsTeamleaders()
    {
        $teamleader = new \Typo3graf\Stafflist\Domain\Model\Persons();
        $objectStorageHoldingExactlyOneTeamleaders = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneTeamleaders->attach($teamleader);
        $this->subject->setTeamleaders($objectStorageHoldingExactlyOneTeamleaders);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneTeamleaders,
            'teamleaders',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addTeamleaderToObjectStorageHoldingTeamleaders()
    {
        $teamleader = new \Typo3graf\Stafflist\Domain\Model\Persons();
        $teamleadersObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $teamleadersObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($teamleader));
        $this->inject($this->subject, 'teamleaders', $teamleadersObjectStorageMock);

        $this->subject->addTeamleader($teamleader);
    }

    /**
     * @test
     */
    public function removeTeamleaderFromObjectStorageHoldingTeamleaders()
    {
        $teamleader = new \Typo3graf\Stafflist\Domain\Model\Persons();
        $teamleadersObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $teamleadersObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($teamleader));
        $this->inject($this->subject, 'teamleaders', $teamleadersObjectStorageMock);

        $this->subject->removeTeamleader($teamleader);
    }
}
