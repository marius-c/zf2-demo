<?php
/**
 * This file is part of Zf2-demo package
 *
 * @author Rafal Ksiazek <harpcio@gmail.com>
 * @copyright Rafal Ksiazek F.H.U. Studioars
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ApplicationDataAccessDoctrineORMLibraryTest\QueryFilter\Command\Repository;

use ApplicationDataAccessDoctrineORMLibrary\QueryFilter\Command\Repository\StartsWithCommand;
use BusinessLogicLibrary\QueryFilter\Criteria;
use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\ORM\Query\Expr;
use PHPUnit_Framework_MockObject_MockObject as MockObject;

class StartsWithCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var StartsWithCommand
     */
    private $testedObject;

    public function setUp()
    {
        $this->testedObject = new StartsWithCommand();
    }

    public function testExecute_WhenCriteriaType_IsNotMatch()
    {
        $queryBuilder = 'can be anything';
        $criteria = new Criteria(Criteria::TYPE_CONDITION_EQUAL, null, 'something');

        $result = $this->testedObject->execute($queryBuilder, $criteria);

        $this->assertFalse($result);
    }

    public function testExecute()
    {
        /** @var MockObject|QueryBuilder $queryBuilder */
        $queryBuilder = $this->getMockBuilder(QueryBuilder::class)
            ->disableOriginalConstructor()
            ->setMethods(['getRootAliases', 'expr'])
            ->getMock();

        $queryBuilder->expects($this->once())
            ->method('getRootAliases')
            ->willReturn(['t']);

        $queryBuilder->expects($this->once())
            ->method('expr')
            ->willReturn(new Expr());

        $criteria = new Criteria(Criteria::TYPE_CONDITION_STARTS_WITH, 'columnName', 'something');

        $result = $this->testedObject->execute($queryBuilder, $criteria);

        $this->assertTrue($result);
        $this->assertSame(
            't.columnName LIKE :columnNameFilterByStartsWith',
            (string)$queryBuilder->getQueryPart('where')
        );
        $this->assertSame(
            [
                ':columnNameFilterByStartsWith' => 'something%',
            ],
            $queryBuilder->getParameters()
        );
    }
}