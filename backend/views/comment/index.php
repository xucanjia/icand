<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '评论管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <!--   <p>
        <?= Html::a('新增评论', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            // 'content:ntext',
            // 替换长文本
            // 方法一 缺点 繁琐 不利于后期修改
            // [
            //     'attribute'=>'content',
            //     'value'=>function($model){ // 参数($model, $key, $index, $column) $model当前行的数据对象 $key当前行的键 $index当前行的索引 $column数据列对象
            //         $tempStr = strip_tags($model->content);

            //         $s = (mb_strlen($tempStr)>20)?'...':'';
            //         return mb_substr($tempStr,0,20,'utf-8').$s;
            //     }
            // ],

            // 方法二
            [
                'attribute' => 'content',
                'value' => 'beginning', //model 中的getbeginning
            ],
            'status',
            'create_time:datetime',
            'userid',
            // 'email:email',
            // 'url:url',
            // 'post_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
