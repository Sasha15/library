<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\User;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BooksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Books');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
 <?php if(Yii::$app->user->identity->role == 1):?>
    <p>
        <?= Html::a(Yii::t('app', 'New Book'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php endif; ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <td>#</td>
                <td> <?php echo Yii::t('app', 'Author') ?></td>
                <td class="book-title"><?php echo Yii::t('app', 'Book title') ?></td>
                <td><?php echo Yii::t('app', 'ISBN') ?></td>
                <td><?php echo Yii::t('app', 'Available') ?></td>
                <?php if(Yii::$app->user->identity->role == 1):?>
                    <td><?php echo Yii::t('app', 'Who took') ?></td>
                <?php endif; ?>
                <?php if(Yii::$app->user->identity->role == 1):?>
                    <td><?php echo Yii::t('app', 'When Taken') ?></td>
                <?php endif; ?>
                <td><?php echo Yii::t('app', 'When Available') ?></td>
                <td><?php echo Yii::t('app', 'Actions') ?></td>
                <?php if(Yii::$app->user->identity->role == 1):?>
                 <td><?php echo Yii::t('app', 'Take / Replace') ?></td>
                  <?php endif; ?>
            </tr>
            <?php $i = 1; ?>
             <?php foreach ($books as $book) { ?>
             <?php var_dump($book->booktransfer); ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $book['book_author'] ?></td>
                    <td class="book-title"><?php echo $book['book_title'] ?></td>
                    <td> <?php  echo $book['isbn'] ?></td>
                    <td><?php echo  isset($book->booktransfer) && !empty($book->booktransfer) ? 'Already taken' : 'Available'   ?></td>
                    <?php if(Yii::$app->user->identity->role == 1):?>
                         <td><?php echo  $book->book_status == 1 ? $book->booktransfer[0] ->user->profile->firstname : 'nobody' ?></td>
                    <?php endif; ?>
                     <?php if(Yii::$app->user->identity->role == 1):?>
                         <td><?php echo  $book->book_status == 1 ? date('d-m-Y', $book->booktransfer[0] ->taken_date) : '' ?></td>
                    <?php endif; ?>
                    <td><?php echo  $book->book_status == 1 ? date('d-m-Y', $book->booktransfer[0] ->return_date) : 'available' ?></td>
                    <td>
                            <?php echo Html::a(
                                    Yii::t('app',''),
                                    ['books/view','id'=>$book->id],
                                    ['class'=>'book-action-link glyphicon glyphicon-eye-open']
                                    ) ?>
                                     <?php if(Yii::$app->user->identity->role == 1):?>
                                        <?php echo Html::a(
                                        Yii::t('app',''),
                                        ['books/update','id'=>$book->id],
                                        ['class'=>'book-action-link glyphicon glyphicon-pencil ']
                                        ) ?>
                                        <?php echo Html::a(
                                        Yii::t('app',''),
                                        ['books/delete','id'=>$book->id],
                                        ['class'=>'book-action-link glyphicon glyphicon-trash ']
                                        ) ?>
                                    <?php endif; ?>
                    </td>
                     <?php if(Yii::$app->user->identity->role == 1):?>
                            <td>
                            <?php  if($book->book_status == 0) : ?>
                                    <?php echo Html::a(
                                        Yii::t('app','Take'),
                                            ['bookstransfers/take','id'=>$book->id],
                                            ['class'=>'take-button']
                                        ) ?>
                                <?php else: ?>
                                        <?php echo Html::a(
                                            Yii::t('app','Return'),
                                                ['bookstransfers/replace','id'=>$book->id],
                                                ['class'=>'return-button']
                                            ) ?>
                            <?php endif; ?>
                            </td>
                    <?php endif; ?>
                </tr>
                <?php $i++ ?>

            <?php } ?>
        </table>
    </div>
</div>
