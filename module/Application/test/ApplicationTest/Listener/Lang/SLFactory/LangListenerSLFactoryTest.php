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

namespace ApplicationTest\Listener\Lang\SLFactory;

use Application\Listener\Lang\LangListener;
use Application\Listener\Lang\SLFactory\LangListenerSLFactory;
use Test\Bootstrap;

class LangListenerSLFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var LangListenerSLFactory
     */
    private $testedObj;

    public function setUp()
    {
        $this->testedObj = new LangListenerSLFactory();
    }

    public function testCreateService()
    {
        $result = $this->testedObj->createService(Bootstrap::getServiceManager());

        $this->assertInstanceOf(LangListener::class, $result);
    }
}