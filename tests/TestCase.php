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

        $this->bearer = 'Bearer 45|aZXF6jRjiEYoJzCEAfQEKGRHPawAde1EJqdAwMb7';
    }
}
