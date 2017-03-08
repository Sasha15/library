<?php

namespace backend\controllers;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Bookstransfers;
use backend\models\BookstransfersForm;
use backend\models\User;

class BookstransfersController extends \yii\web\Controller
{
    public function actionReplace($id)
    {

    	$bookstransfers = Bookstransfers::find()->where(['book_id'=>$id])->orderBy('taken_date DESC')->one();
    	/*echo "<pre>";
    	var_dump($bookstransfers->book->book_status);
    	echo "</pre>";*/


    	$need_to_return = $bookstransfers->return_date;
    	$normal_date = date('m/d/Y', $need_to_return);
    	if(strtotime($normal_date) > strtotime(date('m/d/Y'))){
    		$bookstransfers->book->book_status = 0;
	    	$bookstransfers->real_return_date = (string)time();
	    	$bookstransfers->save();
	    	$bookstransfers->book->save();
	    	return $this->redirect(['books/index']);
    	}else{
    		$now = time();
	            $my_date = strtotime((int)$need_to_return);
	            $datediff = $now - (int)$need_to_return;
	            $diff_day = round($datediff / (60 * 60 * 24));
    		$amount = $diff_day * Yii::$app->params['penalty_amount'];
    		return $this->render('replace', [ 'amount' =>$amount, 'diff_day' => $diff_day]);
    	}
       	// return $this->render('replace', ['bookstransfers' => $bookstransfers]);
    }

    public function actionTake($id)
    {
	$model = new BookstransfersForm();

    	if(isset($_POST['BookstransfersForm']['user_id'])){
    		$bookstransfers = new Bookstransfers();

    		$bookstransfers->user_id = $_POST['BookstransfersForm']['user_id'];
    		$current_user = User::find()->where(['id'=>$_POST['BookstransfersForm']['user_id']])->one();
    		$bookstransfers->book_id = (int)$id;
    		$bookstransfers->taken_date  = (string)time();
    		$bookstransfers->book->book_status = 1;
    		if($current_user->profile->tariff == 1){
    			$bookstransfers->return_date =  (string)strtotime("+30 day",time());
    		}else{
    			$bookstransfers->return_date =  (string)strtotime("+7 day",time());
    		}

    		$bookstransfers->save();
    		$bookstransfers->book->save();
    		return $this->redirect(['books/index']);
    	}
        	return $this->render('take', [ 'model' =>$model]);
    }
}
