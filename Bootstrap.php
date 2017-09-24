<?php

namespace lexsurkov\remotegis;

use Yii;
use yii\base\BootstrapInterface;
use yii\console\Application as ConsoleApplication;
use yii\i18n\PhpMessageSource;
use yii\web\GroupUrlRule;

/**
 * Bootstrap class registers module and user application component. It also creates some url rules which will be applied
 * when UrlManager.enablePrettyUrl is enabled.
 */
class Bootstrap implements BootstrapInterface
{

    /** @inheritdoc */
    public function bootstrap($app)
    {
        /** @var Module $module */
        /** @var \yii\db\ActiveRecord $modelName */
        if ($app->hasModule('remotegis') && ($module = $app->getModule('remotegis')) instanceof Module) {

            if ($app instanceof ConsoleApplication) {
                $module->controllerNamespace = 'lexsurkov\remotegis\commands';
            } else {
                $configUrlRule = [
                    //'prefix' => 'admin',
                    'routePrefix' => 'remotegis',
                    'rules'  => [
                        '<controller:\w+>/<action:\w+>' => "<controller>/<action>",
                    ]
                ];

                $app->urlManager->addRules([new GroupUrlRule($configUrlRule)], false);

            }

        }
    }
}
