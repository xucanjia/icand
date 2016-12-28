<?php
namespace frontend\components;
use Yii;
use yii\Base\Widget;
use yii\helpers\Html;

/**
*  标签云
*/
class TagsCloudWidgets extends Widget
{
	public $tags;

	public function init()
	{
		parent::init();
	}

	public function run()
	{
		$tagString = '';
		$fontStyle =
			[
				'6' => 'danger',
				'5' => 'info',
				'4' => 'warninig',
				'3' => 'primary',
				'2' => 'success',
			];
// echo "<pre>";
// print_r($this->tags);
// exit;
		foreach ($this->tags as $tag=>$weight)
		{

			$url = Yii::$app->urlManager->createUrl(['post/index','PostSearch[tags]'=>$tag]);

			$tagString.='<a href="'.$url.'">'.
					' <h'.$weight.' style="display:inline-block;"><span class="label label-'
					.$fontStyle[$weight].'">'.$tag.'</span></h'.$weight.'></a>';
		}

		return $tagString;
	}










}
