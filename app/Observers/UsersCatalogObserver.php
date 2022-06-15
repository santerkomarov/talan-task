<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class UsersCatalogObserver
{
    /**
     * Clear cache that set in controllers
     * 1) App\Http\Controllers\UsersController\ index()
     * 2) App\Http\Controllers\UsersController\ show()
     *
     * @var void
     */
    public function created() {
        Cache::forget('all-users');
        Cache::forget('one-user');
    }
}
