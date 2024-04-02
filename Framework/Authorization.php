<?php

namespace Framework;

class Authorization
{
    public static function isOwner($resourceOwnerId)
    {
        $sessionUserId = Session::get("id");
        if ($sessionUserId) {
            return $sessionUserId == $resourceOwnerId;
        }

        return false;
    }
}