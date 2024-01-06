<?php
namespace App\GraphQL\Types;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name'          => 'User',
        'description'   => 'A user',
        // Note: only necessary if you use `SelectFields`
        'model'         => User::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::string(),
                'description' => 'The id of the user',
                'resolve' => function($root, array $args) {
                    return strtolower($root->id);
                },
                'alias' => 'user_id',
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'The email of user',
                'resolve' => function($root, array $args) {
                    return strtolower($root->email);
                }
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of user',
                'resolve' => function($root, array $args) {
                    return strtolower($root->name);
                }
            ],
            'isMe' => [
                'type' => Type::boolean(),
                'description' => 'True, if the queried user is the current user',
                'selectable' => false, // Does not try to query this from the database
            ]
        ];
    }

    protected function resolveEmailField($root, array $args)
    {
        return strtolower($root->email);
    }
}