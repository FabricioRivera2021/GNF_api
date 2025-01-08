<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('numeros', function () {
    return true; // You can add authorization logic here if needed
});

Broadcast::routes(['middleware' => ['auth']]); // Use 'web' or 'auth' depending on your authentication method.