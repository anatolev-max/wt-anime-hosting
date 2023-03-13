<?php

namespace app\services;

use app\models\PostType;

class PostTypeService
{
    /**
     * @param array $data
     * @return bool
     */
    public function dc_create(array $data): bool
    {
        $postType = new PostType();
        $postType->name = $data['name'];

        return $postType->save();
    }
}
