<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
namespace ZendTest\Validator;

use Zend\Validator\Barcode;
use Zend\Validator\Barcode\AbstractAdapter;
use Zend\Validator\IsInstanceOf;

class BarcodeTest extends \PHPUnit_Framework_TestCase
{
    public function testTest()
    {
        $mock = $this->getMockBuilder(AbstractAdapter::class)
                ->disableOriginalConstructor()
                ->setMethods(['getLength'])
                ->getMock();
        
        $opts = ['adapter' => $mock];
        $instance = new Barcode($opts);
        
        
        $mock->expects($this->atLeastOnce())
                ->method('getLength')
                ->willReturn(13);
        
        $this->assertFalse($instance->isValid('123456789012345'));
    }
    
    public function testWithandWill()
    {
        $mock = $this->getMockBuilder(AbstractAdapter::class)
                ->disableOriginalConstructor()
                ->setMethods(['hasValidLength'])
                ->getMock();
        
        $opts = ['adapter' => $mock];
        $instance = new Barcode($opts);
        
        
        $mock->expects($this->atLeastOnce())
                ->method('hasValidLength')
                ->with('1234567890')
                ->willReturn(false);
        
        $this->assertFalse($instance->isValid('1234567890'));
    }
}
