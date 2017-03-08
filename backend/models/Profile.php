<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Profile".
 *
 * @property integer $user_id
 * @property string $firstname
 * @property string $lastname
 * @property string $middlename
 * @property string $birthdate
 * @property string $address
 * @property string $phone
 * @property string $pass_number
 * @property string $pass_data
 * @property string $image
 * @property integer $tariff
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'firstname', 'lastname', 'middlename', 'birthdate', 'address', 'phone', 'pass_number', 'pass_data', 'tariff'], 'required'],
            [['user_id', 'tariff'], 'integer'],
            [['address', 'pass_data'], 'string'],
            [['firstname', 'lastname', 'middlename'], 'string', 'max' => 255],
            [['birthdate'], 'string', 'max' => 12],
            [['phone', 'pass_number'], 'string', 'max' => 25],
            [['image'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'firstname' => Yii::t('app', 'Firstname'),
            'lastname' => Yii::t('app', 'Lastname'),
            'middlename' => Yii::t('app', 'Middlename'),
            'birthdate' => Yii::t('app', 'Birthdate'),
            'address' => Yii::t('app', 'Address'),
            'phone' => Yii::t('app', 'Phone'),
            'pass_number' => Yii::t('app', 'Pass Number'),
            'pass_data' => Yii::t('app', 'Pass Data'),
            'image' => Yii::t('app', 'Image'),
            'tariff' => Yii::t('app', 'Tariff'),
        ];
    }
}
