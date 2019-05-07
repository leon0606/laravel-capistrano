<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);

        $stime1 = date('Y-m-d',strtotime('-1 month'));
//        $etime1 = $stime1 + 86399;

        echo ($stime1).PHP_EOL;
//        echo (date('Y-m-d',$etime1)).PHP_EOL;
    }
}
