<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property integer $id
 * @property string $book_author
 * @property string $book_title
 * @property integer $isbn
 * @property string $description
 * @property string $picture
 * @property string $publishing_year
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['book_author', 'book_title', 'isbn', 'description', 'publishing_year'], 'required'],
            [['isbn', 'book_status'], 'integer'],
            [['description'], 'string'],
            [['book_author', 'book_title'], 'string', 'max' => 255],
            [['picture'], 'string', 'max' => 50],
            [['publishing_year'], 'string', 'max' => 12],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'book_author' => Yii::t('app', 'Book Author'),
            'book_title' => Yii::t('app', 'Book Title'),
            'isbn' => Yii::t('app', 'Isbn'),
            'description' => Yii::t('app', 'Description'),
            'picture' => Yii::t('app', 'Picture'),
            'publishing_year' => Yii::t('app', 'Publishing Year'),
        ];
    }
     public function getBooktransfer(){
        return $this->hasMany(Bookstransfers::className(),['book_id'=>'id']);
    }
}
