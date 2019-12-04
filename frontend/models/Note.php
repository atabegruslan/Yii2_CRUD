<?php
namespace frontend\models;

use Yii;
use yii\base\Model;

class Note extends Model
{
	public $title;
	public $category_id;
	public $description;
	public $image;

	public function rules()
	{
		return [
			[['title', 'category_id', 'description'], 'required'],
			[['title', 'description'], 'string'],
			[['category_id'], 'integer'],
			[['image'], 'file', 'extensions' => 'jpg,png,gif'],
		];
	}

	public function attributeLabels()
	{
		return [
			'title' => 'Title',
			'category_id' => 'Category',
			'description' => 'Description',
			'image' => 'Image',
		];
	}
}