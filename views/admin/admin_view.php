<?php
/**
 * Faqs (faqs)
 * @var $this app\components\View
 * @var $this ommu\faq\controllers\AdminController
 * @var $model ommu\faq\models\Faqs
 *
 * @author Eko Hariyanto <haryeko29@gmail.com>
 * @contact (+62)857-4381-4273
 * @copyright Copyright (c) 2018 OMMU (www.ommu.id)
 * @created date 5 January 2018, 17:01 WIB
 * @modified date 29 April 2018, 18:12 WIB
 * @modified by Putra Sudaryanto <putra@ommu.id>
 * @contact (+62)856-299-4114
 * @link https://github.com/ommu/mod-faqs
 *
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Faqs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

if (!$small) {
    $this->params['menu']['content'] = [
        ['label' => Yii::t('app', 'Update'), 'url' => Url::to(['update', 'id' => $model->faq_id]), 'icon' => 'pencil', 'htmlOptions' => ['class' => 'btn btn-primary']],
        ['label' => Yii::t('app', 'Delete'), 'url' => Url::to(['delete', 'id' => $model->faq_id]), 'htmlOptions' => ['data-confirm' => Yii::t('app', 'Are you sure you want to delete this item?'), 'data-method' => 'post', 'class' => 'btn btn-danger'], 'icon' => 'trash'],
    ];
} ?>

<?php
$attributes = [
    'faq_id',
    [
        'attribute' => 'publish',
        'value' => $model->publish == 1 ? Yii::t('app', 'Yes') : Yii::t('app', 'No'),
    ],
    [
        'attribute' => 'category_search',
        'value' => isset($model->category) ? $model->category->title->message : '-',
    ],
    [
        'attribute' => 'question_i',
        'value' => isset($model->questionRltn) ? $model->questionRltn->message : '-',
    ],
    [
        'attribute' => 'answer_i',
        'value' => isset($model->answerRltn) ? $model->answerRltn->message : '-',
        'format' => 'html',
    ],
    'orders',
    [
        'attribute' => 'creation_date',
        'value' => Yii::$app->formatter->asDatetime($model->creation_date, 'medium'),
        'visible' => !$small,
    ],
    [
        'attribute' => 'creationDisplayname',
        'value' => isset($model->creation) ? $model->creation->displayname : '-',
    ],
    [
        'attribute' => 'modified_date',
        'value' => Yii::$app->formatter->asDatetime($model->modified_date, 'medium'),
        'visible' => !$small,
    ],
    [
        'attribute' => 'modifiedDisplayname',
        'value' => isset($model->modified) ? $model->modified->displayname : '-',
    ],
    [
        'attribute' => 'updated_date',
        'value' => Yii::$app->formatter->asDatetime($model->updated_date, 'medium'),
        'visible' => !$small,
    ],
    'slug',
];

echo DetailView::widget([
	'model' => $model,
	'options' => [
		'class' => 'table table-striped detail-view',
	],
	'attributes' => $attributes,
]); ?>