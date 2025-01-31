<?php

namespace NFePHP\EFD\Tests;

use NFePHP\EFD\Elements\ICMSIPI\Z0001;
use PHPUnit\Framework\TestCase;
use stdClass;

class Z0001Test extends TestCase
{
    public function testZ0001()
    {
        $std = new stdClass();
        $std->ind_mov = 1;
        $b1 = new Z0001($std);
        $resp = "{$b1}";
        $expected = '|0001|1|';
        $this->assertEquals($expected, $resp);
    }

    public function testZ0001FailWithString()
    {
        $this->expectException(\InvalidArgumentException::class);

        $std = new stdClass();
        $std->ind_mov = 'A';
        new Z0001($std);
    }

    public function testZ0001FailWithNotValidNumber()
    {
        $this->expectException(\InvalidArgumentException::class);

        $std = new stdClass();
        $std->ind_mov = 2;
        new Z0001($std);
    }
}
