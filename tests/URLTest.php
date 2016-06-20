<?php

class URLTest extends TestCase
{
    /**
     * My test implementation
     */
    public function testInstallationIsIntelligent()
    {
        $this->visit('/');
        $this->visit('/gardens');
        $this->seePageIs('/gardens');
    }
}