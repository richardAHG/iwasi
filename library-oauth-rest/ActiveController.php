<?php

namespace iwasi\library\oauth\rest;

use yii\rest\ActiveController as RestActiveController;

/**
 * ActiveController implementa un conjunto común de acciones para admitir el acceso RESTful a ActiveRecord.
 * 
 * @author Richard Huaman <richard21hg92@gmail.com>
 */
class ActiveController extends RestActiveController
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'index' => [
                'class' => 'enmodel\iwasi\library\rest\IndexAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
            'view' => [
                'class' => 'enmodel\iwasi\library\rest\ViewAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
            'create' => [
                'class' => 'enmodel\iwasi\library\rest\CreateAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
                'scenario' => $this->createScenario,
            ],
            'update' => [
                'class' => 'enmodel\iwasi\library\rest\UpdateAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
                'scenario' => $this->updateScenario,
            ],
            'delete' => [
                'class' => 'enmodel\iwasi\library\rest\DeleteAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
        ];
    }
}
