<?php
use yii\helpers\Html;


?>

<div class="post">
	<div class="title">
		<h2><a href="<?= $model->url; ?>"><?= Html::encode($model->title); ?></a></h2>
		<div class="author">
			<span class="glyphicon glyphicon-time" aria-hidden="true"></span><em>	<?= date('Y-m-d H:i:s',$model->create_time) ?></em>
			<span class="glyphicon glyphicon-user" aria-hidden="true"></span><em>	<?= Html::encode($model->author->username); ?></em>
		</div>
	</div>

	<div class="content">
		<?= $model->beginning ?>
	</div>

</div>
