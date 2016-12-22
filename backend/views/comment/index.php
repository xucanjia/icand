<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\CommentStatus;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '评论管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!-- <?= Html::a('新增评论', ['create'], ['class' => 'btn btn-success']) ?> --><br />
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
             'attribute'=>'id',
             'contentOptions'=>['width'=>'10px']
            ],
            // 'content:ntext',
            // 方法1 用匿名函数
            // ['attribute'=>'content',
            //  'value'=>function($model){
            //     $tmpStr = strip_tags($model->content);
            //     $tmpLen = mb_strlen($tmpStr);

            //     return mb_substr($tmpStr,0,15,'utf-8').($tmpLen>15?'...':'');
            //  }
            // ],

            // 方法2 用gerter方法
            ['attribute'=>'content',
             'value'=>'beginning',

            ],
            // 'userid',
            [
             'attribute'=>'user.username',
             'label'=>'评论者',
             'value'=>'user.username'
            ],
            // 'status',
            [
            'attribute'=>'status',
            'value' => 'status0.name',
            'filter'=>CommentStatus::find()
                    ->select(['name','id'])
                    ->orderBy('position')
                    ->indexBy('id')
                    ->column(),
            'contentOptions'=>function($model){
                return ($model->status == 1)?['class'=>'bg-danger']:[];
             },
            ],
            // 'create_time:datetime',
            ['attribute'=>'create_time',
             'format'=>['date','php: Y-m-d H:i:s']
            ],

            // 'email:email',
            // 'url:url',
            // 'post_id',
            'post.title',

            [
             'class' => 'yii\grid\ActionColumn',
             'template'=>'{view} {update} {delete} {approve}',
             'buttons'=>[
                'approve'=>function($url, $model, $key)
                {
                    $options = [
                        'title'=>Yii::t('yii','审核'),
                        'aria-label'=>Yii::t('yii','审核'),
                        'data-confirm'=>Yii::t('yii','确定通过审核吗?'),
                        'data-method'=>'post',
                        'data-pjax'=>'0',
                    ];

                    return Html::a('<span class="glyphicon glyphicon-check"></span>',$url,$options);
                }
             ],
            ],
        ],
    ]); ?>
</div>
