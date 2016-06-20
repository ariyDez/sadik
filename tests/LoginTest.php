<?php

/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 17.06.2016
 * Time: 19:40
 */
class LoginTest extends TestCase
{
    public function testAdminLoginSuccess()
    {
        $this->visit('/login')
            ->type('admin@gmail.com', 'email')
            ->type('admin1', 'password')
            ->press('Отправить')
            ->seePageIs('/admin')
            ->see('Dashboard');
    }

    public function testAdminLoginFail()
    {
        $this->visit('/login')
            ->type('admin@gmail.com', 'email')
            ->type('admin1', 'password')
            ->seePageIs('/login');
    }
}