<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bookstransfers".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $book_id
 * @property string $taken_date
 * @property string $return_date
 */
class Bookstransfers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bookstransfers';
    }
   /* public function beforeSave($insert){
            $this->book_id = (int)Yii::$app->user->id;
            $this->date_created = (string)time();
            $this->viewed = 0;

            return parent::beforeSave($insert);
    }*/
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'book_id', 'taken_date', 'return_date'], 'required'],
            [['user_id', 'book_id'], 'integer'],
            [['taken_date', 'return_date', 'real_return_date'], 'string', 'max' => 13],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'book_id' => Yii::t('app', 'Book ID'),
            'taken_date' => Yii::t('app', 'Taken Date'),
            'return_date' => Yii::t('app', 'Return Date'),
        ];
    }
     public function getUser(){
        return $this->hasOne(User::className(),['id'=>'user_id']);
    }
     public function getBook(){
        return $this->hasOne(Books::className(),['id'=>'book_id']);
    }
}
