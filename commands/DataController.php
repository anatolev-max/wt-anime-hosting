<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\BaseInflector;

class DataController extends Controller
{
    const POST_TYPE = [
    ];

    public function actionImport(): int
    {
        define('ENTITIES', [
            'post_type',
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
