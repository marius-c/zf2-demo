<?php

namespace Application\Library\QueryFilter\Command\Repository;

use Application\Library\QueryFilter\Command\Repository\CommandInterface;
use Application\Library\QueryFilter\Criteria;
use Doctrine\ORM\QueryBuilder;

class MinCommand extends AbstractCommand implements CommandInterface
{
    public static $commandName = Criteria::TYPE_CONDITION_MIN;

    /**
     * @param QueryBuilder $qb
     * @param Criteria     $criteria
     * @param array        $entityFieldNames
     * @param string       $alias
     * @param int          $i
     *
     * @return bool
     */
    public function execute(QueryBuilder $qb, Criteria $criteria, array $entityFieldNames, $alias, $i)
    {
        if ($criteria->getType() !== self::$commandName) {
            return false;
        }

        $this->checkColumnNameInEntityFieldNames($criteria->getKey(), $entityFieldNames);
        $preparedColumnName = $this->prepareColumnName($criteria->getKey(), $alias);

//        var_dump($preparedColumnName, $condition->getValue()); exit;

        $param = ':min' . $i;
        $qb->andWhere($qb->expr()->gte($preparedColumnName, $param))
            ->setParameter($param, $criteria->getValue());

        return true;
    }
}