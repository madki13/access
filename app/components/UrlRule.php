<?php

namespace app\components;

use mdm\widgets\BaseObect;
use yii\web\UrlRuleInterface;
use yii\base\BaseObject;

class UrlRUle extends BaseObject implements UrlRuleInterface {

    public function createUrl($manager, $route, $params) {

        switch($route){
            //Untuk berita, harus pakai nama slug-nya
            case 'berita/view':
                $berita= \app\models\berita::find()->where(['id'=>$params['id']])->one();
                if(empty($berita))
                    return false;
                return 'berita/'.$berita->link;
        }

        return false;
    }

    public function parseRequest($manager, $request) {
        $pathInfo = $request->getPathInfo();

        //Baca rule untuk berita
        if (preg_match('%^berita/([\w-]+)?$%', $pathInfo, $matches)) {
            if(isset($matches[1])){
                $berita = \app\models\berita::findByLink($matches[1]);
                if(empty($berita)) return false;
                return ['berita/view',['id'=>$berita->id]];
            }else{
                throw new \yii\web\NotFoundHttpException('Page not found.');
            }
        }
        

        return false;
    }

}
