<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('audiences.create', function () {
    return true;
});

Broadcast::channel('audiences.{audienceId}.contact.imported', function (User $user, int $audienceId) {
    return true;
});
