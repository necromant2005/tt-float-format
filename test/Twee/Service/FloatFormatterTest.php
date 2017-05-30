<?php

namespace Twee\Service;

use PHPUnit\Framework\TestCase;

class FloatFormatterTest extends TestCase
{
    public function provider() : array
    {
        return [
            [0.00112, '0.0011'],
            [-0.00112, '-0.0011'],
            [1.00112, '1'],
            [100.112, '100.11'],
            [23.00, '23'],
            [0, '0'],
        ];
    }

    /**
     * @dataProvider provider
     */
    public function test(float $value, string $formatted)
    {
        $service = new FloatFormatter();
        $this->assertEquals($formatted, $service->format($value));
        $this->assertEquals(strlen($formatted), strlen($service->format($value)));
    }
}