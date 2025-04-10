<?php

namespace Illuminate\Http;

interface Request
{
    /**
     * @return \App\Models\Customer|null
     */
    public function user($guard = null);
}