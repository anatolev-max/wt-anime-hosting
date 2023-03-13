<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\BaseInflector;

class DataController extends Controller
{
    const POST_TYPES = [
        [
            'name' => 'Фильм',
        ],
        [
            'name' => 'Сериал',
        ],
        [
            'name' => 'Видео',
        ],
    ];

    const POSTS = [
        [
            'title' => 'example-title-1',
            'desc' => 'example-desc',
            'year' => 2001,
            'image_path' => '1.jpg',
            'episode_count' => 10,
            'user_id' => 1,
            'type_id' => 2,
        ],
        [
            'title' => 'example-title-2',
            'desc' => 'example-desc',
            'year' => 2001,
            'image_path' => '2.jpg',
            'episode_count' => 10,
            'user_id' => 1,
            'type_id' => 2,
        ],
    ];

    public function actionImport(): int
    {
        define('ENTITIES', [
            'post_type',
            'post',
        ]);

        foreach (ENTITIES as $entity) {
            $pluralize_entity = (new BaseInflector())->pluralize($entity);
            $entity_const = strtoupper($pluralize_entity);
            print $pluralize_entity . ":\n";

            if (defined("self::$entity_const")) {
                foreach (constant("self::$entity_const") as $item) {
                    $serviceClass = '\app\services\\' . (new BaseInflector())->camelize(ucfirst($entity)) . 'Service';
                    $serviceClassMethod = 'dc_create';

                    if (class_exists($serviceClass) && method_exists($serviceClass, $serviceClassMethod)) {
                        var_dump((new $serviceClass())->{$serviceClassMethod}($item));
                    }
                }
            }

            print "\n";
        }

        return ExitCode::OK;
    }
}
