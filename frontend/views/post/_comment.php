<?php
use yii\helpers\Html;
use yii\widget\ActiveForm;

?>

<?php foreach($comments as $comment): ?>
<div class="comment">
	<div class="row">
		<div class="col-md-12">
			<div class="comment_detail"></div>
			<p class="bg-info"></p>
			<span class="glyphicon glyphicon-user" aria-hidden="ture"></span>
			<em><?= Html::encode($comment->user->username); ?></em>
			<br>
			<?= nl2br($comment->content); ?>
		</div>
	</div>
</div>
<?php endforeach; ?>
