<?php

// use Yii;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use frontend\components\TagsCloudWidgets;
use frontend\components\RctReplayWidget;
use common\models\Post;



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
                <li>文章列表</li>
            </ol>
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

        <!-- 右侧内容 -->
        <div class='col-md-3'>
            <div class="searchchbox">
                <ul class="list-group">
                    <li class="list-group-item">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>查找文章
                        <!-- 缓存 -->
                        <?php

                                //  $data = Post::find()->count();
                                // sleep(5);
                            $data = Yii::$app->cache->get('postCount');
                            if ($data === false) {
                                $data = Post::find()->count();
                                sleep(5);
                                Yii::$app->cache->set('postCount',$data);
                            }

                            echo '('.$data.')';
                        ?>
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

