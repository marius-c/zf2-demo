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

namespace ApplicationFeatureLibraryBooksTest\Form;

use ApplicationFeatureLibraryBooks\Form\DeleteFormInputFilter;
use Zend\Filter\FilterChain;
use Zend\InputFilter\InputFilter;
use Zend\Validator\ValidatorChain;

class DeleteFormInputFilterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DeleteFormInputFilter
     */
    private $testedObj;

    public function setUp()
    {
        $this->testedObj = new DeleteFormInputFilter();
    }

    public function testConstructor()
    {
        $this->assertInstanceOf(InputFilter::class, $this->testedObj);
    }

    public function testParametersOfIdElement()
    {
        $idInput = $this->testedObj->get('id');
        $this->assertTrue($idInput->isRequired());

        /** @var FilterChain $filterChain */
        $filterChain = $idInput->getFilterChain();
        $filters = $filterChain->getFilters()->toArray();
        $this->assertInstanceOf('Zend\Filter\Digits', $filters[0]);

        /** @var ValidatorChain $validatorChain */
        $validatorChain = $idInput->getValidatorChain();
        $validators = $validatorChain->getValidators();

        /** @var \Zend\Validator\GreaterThan $firstValidator */
        $firstValidator = $validators[0]['instance'];
        $this->assertInstanceOf('Zend\Validator\GreaterThan', $firstValidator);
        $this->assertEquals($firstValidator->getMin(), 0);
        $this->assertEquals($firstValidator->getInclusive(), false);
        $this->assertEquals($firstValidator->getOption('encoding'), 'UTF-8');
    }

    /**
     * @dataProvider dataProviderForTestIdElementByValue
     *
     * @param array $data
     * @param bool  $expectedResult
     */
    public function testIdElementByValue(array $data, $expectedResult)
    {
        $this->testedObj->setData($data);
        $result = $this->testedObj->isValid();

        $this->assertSame($expectedResult, $result);
    }

    public function dataProviderForTestIdElementByValue()
    {
        return [
            'Empty string should be invalid' => [['id' => ''], false],
            'Zero should be invalid' => [['id' => 0], false],
            'String should be invalid' => [['id' => 'ads'], false],
            'Number string with empty spaces should be valid' => [['id' => ' 345 '], true],
            'Number string with other characters should be valid' => [['id' => 'ab345c'], true],
            'Number should be valid' => [['id' => 123], true]
        ];
    }
}