<?php

namespace App\GraphQL\Queries;

use App\Models\User;

class HelloQuery
{
    public function resolve()
    {
        return 'Hello, GraphQL!';
    }
}
