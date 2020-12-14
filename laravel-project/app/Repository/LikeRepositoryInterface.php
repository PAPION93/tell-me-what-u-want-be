<?php

namespace App\Repository;

interface LikeRepositoryInterface
{
    public function likes();

    public function isLiked();
}
