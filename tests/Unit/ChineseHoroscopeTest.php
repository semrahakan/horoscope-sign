<?php
/**
 * Created by PhpStorm.
 * User: semrahakan
 * Date: 28/02/2019
 * Time: 13:36
 */

namespace App\Business;


class ChineseHoroscopeTest extends \PHPUnit\Framework\TestCase
{
    public function test15May1992()
    {
        $object = new ChineseHoroscope();
        $result = $object->getSign(1992);
        $this->assertEquals('Monkey', $result->getName());
        $this->assertInstanceOf(ChineseSign::class, $result);
    }
}
