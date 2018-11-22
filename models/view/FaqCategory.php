<?php
/**
 * FaqCategory
 * 
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2018 Ommu Platform (www.ommu.co)
 * @created date 27 April 2018, 00:32 WIB
 * @link https://ecc.ft.ugm.ac.id
 *
 * This is the model class for table "_faq_category".
 *
 * The followings are the available columns in table "_faq_category":
 * @property integer $cat_id
 * @property string $faqs
 * @property integer $faq_all
 *
 */

namespace ommu\faq\models\view;

use Yii;
use yii\helpers\Url;
use yii\helpers\Html;

class FaqCategory extends \app\components\ActiveRecord
{
	public $gridForbiddenColumn = [];

	/**
	 * @return string the associated database table name
	 */
	public static function tableName()
	{
		return '_faq_category';
	}

	/**
	 * @return string the primarykey column
	 */
	public static function primaryKey()
	{
		return ['cat_id'];
	}

	/**
	 * @return \yii\db\Connection the database connection used by this AR class.
	 */
	public static function getDb()
	{
		return Yii::$app->get('ecc4');
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return [
			[['cat_id', 'faq_all'], 'integer'],
			[['faqs'], 'number'],
		];
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return [
			'cat_id' => Yii::t('app', 'Category'),
			'faqs' => Yii::t('app', 'Faqs'),
			'faq_all' => Yii::t('app', 'Faq All'),
		];
	}

	/**
	 * Set default columns to display
	 */
	public function init() 
	{
		parent::init();

		$this->templateColumns['_no'] = [
			'header' => Yii::t('app', 'No'),
			'class'  => 'yii\grid\SerialColumn',
			'contentOptions' => ['class'=>'center'],
		];
		$this->templateColumns['cat_id'] = [
			'attribute' => 'cat_id',
			'value' => function($model, $key, $index, $column) {
				return $model->cat_id;
			},
		];
		$this->templateColumns['faqs'] = [
			'attribute' => 'faqs',
			'value' => function($model, $key, $index, $column) {
				return $model->faqs;
			},
		];
		$this->templateColumns['faq_all'] = [
			'attribute' => 'faq_all',
			'value' => function($model, $key, $index, $column) {
				return $model->faq_all;
			},
		];
	}

	/**
	 * User get information
	 */
	public static function getInfo($id, $column=null)
	{
		if($column != null) {
			$model = self::find()
				->select([$column])
				->where(['cat_id' => $id])
				->one();
			return $model->$column;
			
		} else {
			$model = self::findOne($id);
			return $model;
		}
	}
}