<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\User;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function signIn($user = null)
    {
        $user = is_array($user) ? create(User::class, $user) : $user;
        $user = $user ?? create(User::class);

        $this->actingAs($user);

        return $user;
    }
}
