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

        $this->bearer = 'Bearer 40|kSpqmPleNpqvPDo7bnbvtgJY1gu0DDWFp0aCN6qU';
    }
}
