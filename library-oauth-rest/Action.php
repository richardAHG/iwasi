<?php

namespace iwasi\library\oauth\rest;

use Yii;
use yii\rest\Action as RestAction;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;

/**
 * La acción es la clase base para las clases de acción 
 * que implementan la API RESTful.
 * 
 * @author Richard Huaman <richard21hg92@gmail.com>
 */
class Action extends RestAction
{
    public function init()
    {
        parent::init();
        $this->findModel = function ($id, $action) {

            $modelClass = $action->modelClass;
            // $model = $modelClass::findIfBelongsToProject($id, $proyectoId);
            $model = $modelClass::find()
                ->where(["id" => $id])
                ->andWhere([
                    "estado" => true,
                ])
                ->one();
            if (isset($model)) {
                return $model;
            }

            throw new NotFoundHttpException("Object not found: $id");
        };
    }
}
