<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use  backend\models\User;
use backend\models\Books;
use backend\models\Bookstrasfer;

/* @var $this yii\web\View */
/* @var $model backend\models\Books */
/* @var $form ActiveForm */
?>
<div class="books-take">
    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'user_id') ?>
             <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- books-take -->