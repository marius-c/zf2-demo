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

namespace BusinessLogicLibrary\QueryFilter\Command\Condition;

use BusinessLogicLibrary\QueryFilter\Criteria;
use BusinessLogicLibrary\QueryFilter\QueryFilter;

class BetweenCommand implements CommandInterface
{
    public static $commandRegex = '/^\$(between)\(([^\,]*),([^\)]*)\)/';

    public function execute($key, $value, QueryFilter $queryFilter)
    {
        if (!preg_match(static::$commandRegex, $value, $matches)) {
            return false;
        }

        $command = trim($matches[1]);
        $start = trim($matches[2]);
        $end = trim($matches[3]);

        if ($start > $end) {
            list($start, $end) = [$end, $start];
        }

        $queryFilter->addCriteria(
            new Criteria(
                $command,
                $key,
                [$start, $end]
            )
        );

        return true;
    }
}