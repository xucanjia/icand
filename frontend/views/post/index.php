<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '文章';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class='container'>

    <div class='row'>

        <!-- 文章列表 -->
        <div class='col-md-9'>
            <?= ListView::widget(
                 [
                    'id' => 'postList',
                    'dataProvider' => $dataProvider,
                    'itemView' => '_listitem', // 子视图,显示一篇文章的的标题内容
                    'pager' => [
                                'maxButtonCount' => 10,
                                'nextPageLabel'  => Yii::t('app', '下一页'),
                                'prevPageLabel'  => Yii::t('app', '上一页'),
                               ],
                 ]
            )?>
        </div>

        <div class='col-md-3'>
            右侧内容
        </div>

    </div>



</div>

