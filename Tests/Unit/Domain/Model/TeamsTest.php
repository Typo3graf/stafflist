<?php
namespace T3graf\Stafflist\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Development-Team <development@t3graf.de>
 */
class TeamsTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \T3graf\Stafflist\Domain\Model\Teams
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \T3graf\Stafflist\Domain\Model\Teams();
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
}
