<?php


namespace Tests\Unit;


use Tests\TestCase;

class LocalizationTest extends TestCase
{
    /**
     *@test
     */
    public function a_helper_function_exists_to_create_a_localised_route_for_the_current_app_locale()
    {
        app()->setLocale('ko');

        $this->assertEquals('/ko/test-route', localRoute('/test-route'));

        app()->setLocale('en');

        $this->assertEquals('/en/test-route', localRoute('/test-route'));
    }
}