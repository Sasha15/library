<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Profiles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- <p>
        <?php //Html::a(Yii::t('app', 'Create Profile'), ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
    <?php if(Yii::$app->user->identity->role == 1):?>
        <?php echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'user_id',
                'firstname',
                'lastname',
                //'middlename',
                'birthdate',
                // 'address:ntext',
                'phone',
                // 'pass_number',
                // 'pass_data:ntext',
                // 'image',
                // 'tariff',
                ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],

            ],
        ]);
    else: ?>
     <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
       <?= DetailView::widget([

        'model' => $model,
        'attributes' => [
            'user_id',
            'firstname',
            'lastname',
            'middlename',
            'birthdate',
            'address:ntext',
            'phone',
            'pass_number',
            'pass_data:ntext',
            'image',
            'tariff',
        ],

    ]) ?>
   <?php endif; ?>

</div>

