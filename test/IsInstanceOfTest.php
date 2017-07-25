<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
namespace ZendTest\Validator;

use Zend\Validator\IsInstanceOf;
use Zend\Validator\Between;

class IsInstanceOfTest extends \PHPUnit_Framework_TestCase
{
    public function testTest() 
    {
    	$options = ['className' => Between::class];
    	$instanceOfValidator = new IsInstanceOf($options);

        $this->assertNotEquals('FooBar', $instanceOfValidator->getClassName());
        $this->assertEquals(Between::class, $instanceOfValidator->getClassName());
    }
    
    public function testMock()
    {
        $mock = $this->getMockBuilder(IsInstanceOf::class)
                ->disableOriginalConstructor()
                ->getMock();
        
        $options = ['className' => IsInstanceOf::class];
        $isInstanceOfValidator = new IsInstanceOf($options);
        
        $this->assertEquals(true, $isInstanceOfValidator->isValid($mock));
    }
}
