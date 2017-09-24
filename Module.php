<?php

namespace lexsurkov\remotegis;

class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'lexsurkov\remotegis\controllers';

    public $key;

    public $baseUrl = '';

    /**
     * @inheritdoc
     */
    public function init()
    {

        parent::init();
    }
}
