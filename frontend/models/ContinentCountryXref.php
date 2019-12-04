<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class ContinentCountryXref extends ActiveRecord
{
    public $country_ids = array();

    public static function tableName()
    {
        return 'country_continent_xref';
    }

    public function rules()
    {
        return [
            [['continent_id', 'country_ids'], 'required'],
            [['continent_id'], 'integer'],
        ];
    }
}