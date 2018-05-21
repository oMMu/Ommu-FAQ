<?php
/**
 * FaqHelpfulQuery
 *
 * This is the ActiveQuery class for [[\ommu\faq\models\FaqHelpful]].
 * @see \ommu\faq\models\FaqHelpful
 * 
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2018 ECC UGM (ecc.ft.ugm.ac.id)
 * @created date 27 April 2018, 00:38 WIB
 * @link https://ecc.ft.ugm.ac.id
 *
 */

namespace ommu\faq\models\query;

class FaqHelpfulQuery extends \yii\db\ActiveQuery
{
	/*
	public function active()
	{
		return $this->andWhere('[[status]]=1');
	}
	*/

	/**
	 * @inheritdoc
	 * @return \ommu\faq\models\FaqHelpful[]|array
	 */
	public function all($db = null)
	{
		return parent::all($db);
	}

	/**
	 * @inheritdoc
	 * @return \ommu\faq\models\FaqHelpful|array|null
	 */
	public function one($db = null)
	{
		return parent::one($db);
	}
}
