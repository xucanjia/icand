<?php
namespace console\controllers;

use yii\console\Controller;
use common\models\Post;

/**
*
*/
class HelloController extends Controller
{
	public $rev;
	public function options()
	{
		return ['rev'];
	}

	public function optionAliases()
	{
		return ['r'=>'rev'];
	}

	public function actionIndex()
	{
		if ($this->rev == 1) {
			echo strrev("hello world!");
		}
		else{
			echo "hello  world!";
		}
	}
	// public function actionIndex()
	// {
	// 	echo "hellp me!!!!";
	// }

	public function actionList()
	{
		$posts = Post::find()->all();

		foreach ($posts as $v) {
			echo ($v['id'].'---'.$v['title']."\n");
		}
	}

	public function actionWho($name)
	{
		echo("hello".$name."\n");
	}

	public function actionAll(array $name)
	{
		var_dump($name);
	}
}
