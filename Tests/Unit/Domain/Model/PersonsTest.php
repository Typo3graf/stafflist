<?php
namespace T3graf\Stafflist\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Development-Team <development@t3graf.de>
 */
class PersonsTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \T3graf\Stafflist\Domain\Model\Persons
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \T3graf\Stafflist\Domain\Model\Persons();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getLastnameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getLastname()
        );
    }

    /**
     * @test
     */
    public function setLastnameForStringSetsLastname()
    {
        $this->subject->setLastname('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'lastname',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getFirstnameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getFirstname()
        );
    }

    /**
     * @test
     */
    public function setFirstnameForStringSetsFirstname()
    {
        $this->subject->setFirstname('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'firstname',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle()
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'title',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getSalutationReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getSalutation()
        );
    }

    /**
     * @test
     */
    public function setSalutationForIntSetsSalutation()
    {
        $this->subject->setSalutation(12);

        self::assertAttributeEquals(
            12,
            'salutation',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAvatarReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getAvatar()
        );
    }

    /**
     * @test
     */
    public function setAvatarForFileReferenceSetsAvatar()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setAvatar($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'avatar',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getFunctionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getFunction()
        );
    }

    /**
     * @test
     */
    public function setFunctionForStringSetsFunction()
    {
        $this->subject->setFunction('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'function',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTasksReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTasks()
        );
    }

    /**
     * @test
     */
    public function setTasksForStringSetsTasks()
    {
        $this->subject->setTasks('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'tasks',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getIncompanyReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getIncompany()
        );
    }

    /**
     * @test
     */
    public function setIncompanyForDateTimeSetsIncompany()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setIncompany($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'incompany',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getBuildingReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getBuilding()
        );
    }

    /**
     * @test
     */
    public function setBuildingForStringSetsBuilding()
    {
        $this->subject->setBuilding('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'building',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getRoomReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getRoom()
        );
    }

    /**
     * @test
     */
    public function setRoomForStringSetsRoom()
    {
        $this->subject->setRoom('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'room',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPhoneReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPhone()
        );
    }

    /**
     * @test
     */
    public function setPhoneForStringSetsPhone()
    {
        $this->subject->setPhone('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'phone',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMobileReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMobile()
        );
    }

    /**
     * @test
     */
    public function setMobileForStringSetsMobile()
    {
        $this->subject->setMobile('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'mobile',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getFaxReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getFax()
        );
    }

    /**
     * @test
     */
    public function setFaxForStringSetsFax()
    {
        $this->subject->setFax('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'fax',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getEmailReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getEmail()
        );
    }

    /**
     * @test
     */
    public function setEmailForStringSetsEmail()
    {
        $this->subject->setEmail('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'email',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getOfficehoursReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getOfficehours()
        );
    }

    /**
     * @test
     */
    public function setOfficehoursForStringSetsOfficehours()
    {
        $this->subject->setOfficehours('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'officehours',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getBioReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getBio()
        );
    }

    /**
     * @test
     */
    public function setBioForStringSetsBio()
    {
        $this->subject->setBio('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'bio',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTwitterReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTwitter()
        );
    }

    /**
     * @test
     */
    public function setTwitterForStringSetsTwitter()
    {
        $this->subject->setTwitter('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'twitter',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getFacebookReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getFacebook()
        );
    }

    /**
     * @test
     */
    public function setFacebookForStringSetsFacebook()
    {
        $this->subject->setFacebook('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'facebook',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getInstagramReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getInstagram()
        );
    }

    /**
     * @test
     */
    public function setInstagramForStringSetsInstagram()
    {
        $this->subject->setInstagram('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'instagram',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getXingReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getXing()
        );
    }

    /**
     * @test
     */
    public function setXingForStringSetsXing()
    {
        $this->subject->setXing('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'xing',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getGithubReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getGithub()
        );
    }

    /**
     * @test
     */
    public function setGithubForStringSetsGithub()
    {
        $this->subject->setGithub('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'github',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getGitlabReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getGitlab()
        );
    }

    /**
     * @test
     */
    public function setGitlabForStringSetsGitlab()
    {
        $this->subject->setGitlab('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'gitlab',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTeamsReturnsInitialValueForTeams()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getTeams()
        );
    }

    /**
     * @test
     */
    public function setTeamsForObjectStorageContainingTeamsSetsTeams()
    {
        $team = new \T3graf\Stafflist\Domain\Model\Teams();
        $objectStorageHoldingExactlyOneTeams = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneTeams->attach($team);
        $this->subject->setTeams($objectStorageHoldingExactlyOneTeams);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneTeams,
            'teams',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addTeamToObjectStorageHoldingTeams()
    {
        $team = new \T3graf\Stafflist\Domain\Model\Teams();
        $teamsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $teamsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($team));
        $this->inject($this->subject, 'teams', $teamsObjectStorageMock);

        $this->subject->addTeam($team);
    }

    /**
     * @test
     */
    public function removeTeamFromObjectStorageHoldingTeams()
    {
        $team = new \T3graf\Stafflist\Domain\Model\Teams();
        $teamsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $teamsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($team));
        $this->inject($this->subject, 'teams', $teamsObjectStorageMock);

        $this->subject->removeTeam($team);
    }

    /**
     * @test
     */
    public function getFunctionsReturnsInitialValueForFunctions()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getFunctions()
        );
    }

    /**
     * @test
     */
    public function setFunctionsForObjectStorageContainingFunctionsSetsFunctions()
    {
        $function = new \T3graf\Stafflist\Domain\Model\Functions();
        $objectStorageHoldingExactlyOneFunctions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneFunctions->attach($function);
        $this->subject->setFunctions($objectStorageHoldingExactlyOneFunctions);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneFunctions,
            'functions',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addFunctionToObjectStorageHoldingFunctions()
    {
        $function = new \T3graf\Stafflist\Domain\Model\Functions();
        $functionsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $functionsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($function));
        $this->inject($this->subject, 'functions', $functionsObjectStorageMock);

        $this->subject->addFunction($function);
    }

    /**
     * @test
     */
    public function removeFunctionFromObjectStorageHoldingFunctions()
    {
        $function = new \T3graf\Stafflist\Domain\Model\Functions();
        $functionsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $functionsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($function));
        $this->inject($this->subject, 'functions', $functionsObjectStorageMock);

        $this->subject->removeFunction($function);
    }

    /**
     * @test
     */
    public function getLocationsReturnsInitialValueForLocations()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getLocations()
        );
    }

    /**
     * @test
     */
    public function setLocationsForObjectStorageContainingLocationsSetsLocations()
    {
        $location = new \T3graf\Stafflist\Domain\Model\Locations();
        $objectStorageHoldingExactlyOneLocations = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneLocations->attach($location);
        $this->subject->setLocations($objectStorageHoldingExactlyOneLocations);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneLocations,
            'locations',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addLocationToObjectStorageHoldingLocations()
    {
        $location = new \T3graf\Stafflist\Domain\Model\Locations();
        $locationsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $locationsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($location));
        $this->inject($this->subject, 'locations', $locationsObjectStorageMock);

        $this->subject->addLocation($location);
    }

    /**
     * @test
     */
    public function removeLocationFromObjectStorageHoldingLocations()
    {
        $location = new \T3graf\Stafflist\Domain\Model\Locations();
        $locationsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $locationsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($location));
        $this->inject($this->subject, 'locations', $locationsObjectStorageMock);

        $this->subject->removeLocation($location);
    }
}
