<?php

return [
    'api_prefix' => 'api',
    'api_middleware' => ['auth:sanctum', 'jcs.superadmin'],

    'user_model' => \App\Models\User::class,
    'user_name_column' => 'name',
    'user_email_column' => 'email',
    'user_password_column' => 'password',
];
