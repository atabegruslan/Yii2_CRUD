<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "review".
 *
 * @property int $id
 * @property string $place
 * @property int $country_id
 * @property int $user_id
 * @property string $review
 * @property string $image_url
 *
 * @property Country $country
 * @property User $user
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['place', 'country_id', 'user_id', 'review'], 'required'],
            [['country_id', 'user_id'], 'integer'],
            [['place'], 'string', 'max' => 100],
            [['review'], 'string', 'max' => 1000],
            [['image_url'], 'file', 'extensions' => 'jpg,png,gif'],
            [['trip_start', 'trip_end'], 'safe'],
            [['trip_end'], 'compareDate'],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'place' => 'Place',
            'country_id' => 'Country',
            'user_id' => 'User',
            'review' => 'Review',
            'image_url' => 'Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function compareDate($attr, $params)
    {
        $trip_start = date($this->trip_start);
        $trip_end   = date($this->trip_end);

        if ($trip_start > $trip_end)
        {
            $this->addError($attr, 'End date must be later then start date!');
        }
    }
}
