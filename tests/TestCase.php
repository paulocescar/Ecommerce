<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    
    protected $bearer;

    public function setUp(): void
    {
        parent::setUp();

        $this->bearer = 'Bearer 25|Y5hoRcsOoKyVPB8C5RFaUl4xwVzsDP12ZoQvbmxY';
    }
}
