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

        $this->bearer = 'Bearer 1|oAWavQIA7ENsiO25CwQlMkbYmk8SBW4cVR2gWU7f';
    }
}
