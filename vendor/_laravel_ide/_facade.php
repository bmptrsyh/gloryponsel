<?php

namespace Illuminate\Support\Facades;

interface Auth
{
    /**
     * @return \App\Models\Customer|false
     */
    public static function loginUsingId(mixed $id, bool $remember = false);

    /**
     * @return \App\Models\Customer|false
     */
    public static function onceUsingId(mixed $id);

    /**
     * @return \App\Models\Customer|null
     */
    public static function getUser();

    /**
     * @return \App\Models\Customer
     */
    public static function authenticate();

    /**
     * @return \App\Models\Customer|null
     */
    public static function user();

    /**
     * @return \App\Models\Customer|null
     */
    public static function logoutOtherDevices(string $password);

    /**
     * @return \App\Models\Customer
     */
    public static function getLastAttempted();
}