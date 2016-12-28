<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use frontend\components\TagsCloudWidgets;
use frontend\components\RctReplayWidget;
use yii\helpers\HtmlPurifier;
use common\models\Comment;



/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<div class='container'>

    <div class='row'>

        <!-- 文章列表 -->
        <div class='col-md-9'>
            <ol class="breadcrumb">
                <li><a href="<?= Yii::$app->HomeUrl; ?>">首页</a></li>
                <li><a href="<?= Yii::$app->HomeUrl; ?>?r=post/index">文章列表</a></li>
                <li class="active"><?= $model->title; ?></li>
            </ol>
            <div class="post">
                <h2><a href="<?= $model->url; ?>"><?= Html::encode($model->title); ?></h2>
            </div>
            <div class="author">
                <span class="glyphicon glyphicon-time" aria-hidden="true"></span><em>
                <?= date('Y-m-d H:i:s',$model->create_time); ?></em>

                <span class="glyphicon glyphicon-user" aria-hidden="true"></span><em>
                <?= Html::encode($model->author->username); ?></em>
            </div>
            <br>
            <div class="content">
                <?= HTMLPurifier::process($model->content); ?>
            </div>
            <br>
            <!-- 文章标签 -->
            <div class="nav">
                <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
                <?= implode(',' ,$model->tagLinks); ?>
                <br>
                <?= Html::a("评论 ({$model->commentCount})",$model->url.'#comments') ?>
                | 最后更新于 <?= date('Y-m-d', $model->update_time) ?>
            </div>
            <div id="comments">
                <?php if ($added) { ?>
                    <div class="alert alert-warning alert-dismissible" role="alert">
                      <h4>感谢你的回复,我们会尽快通过审核发布!</h4>

                      <p><?= nl2br($commentModel->content) ?></p>
                      <button type="button" class="close" data-dismiss="alert">
                      <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                      </button>
                      <strong>Warning!</strong> Better check yourself, you're not looking too good.
                    </div>
                <?php } ?>

                <?php if($model->commentCount >= 1) : ?>
                    <h5><?= $model->commentCount.'条评论'; ?></h5>
                    <?= $this->render('_comment',array('post'=>$model,'comments'=>$model->activeComments)) ?>
                <?php endif; ?>
                <br>
                <h4>发表评论</h4>
                <?php
                    $postComment = new Comment();
                    echo $this->render('_guestform',array('id'=>$model->id,'commentModel'=>$commentModel));
                ?>
            </div>
        </div>

        <!-- 右侧内容 -->
        <div class='col-md-3'>
            <div class="searchchbox">
                <ul class="list-group">
                    <li class="list-group-item">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>查找文章
                    </li>
                    <li class="list-group-item">
                        <form class="form-inline" action="index.php?r=post/index" id="w0" method="get">
                            <input type="form-group" class="form-control" name="PostSearch[title]" id="w0input" placeholder="按标题搜索">
                          <button type="submit" class="btn btn-default">搜索</button>
                        </form>
                    </li>
                </ul>
            </div>
            <div class="tagcloudbox">
                <ul class="list-group">
                    <li class="list-group-item">
                        <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>标签云
                    </li>
                    <li class="list-group-item">
                        <?= TagsCloudWidgets::widget(['tags'=>$tags]); ?>
                    </li>
                </ul>
            </div>
            <div class="commentbox">
                <ul class="list-group">
                    <li class="list-group-item">
                    <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>最新回复
                    </li>
                    <li class="list-group-item">
                        <?= RctReplayWidget::widget(['recentComments'=>$recentComments]); ?>
                    </li>
                </ul>
            </div>

        </div>

    </div>



</div>

