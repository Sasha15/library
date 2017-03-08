<?php

/* @var $this yii\web\View */
use backend\models\Books;
use backend\models\Bookstransfers;
use backend\models\User;
$this->title = 'My Yii Application';
?>
<div class="site-index">
 <?php if (Yii::$app->user->identity->role == 1): ?>
    <div class="jumbotron">
        <h1>Books which should be returned today</h1>
    </div>
<?php else: ?>
     <div class="jumbotron">
        <h1>Books which you took</h1>
    </div>
<?php endif; ?>
    <div class="body-content">

        <div class="row">
        <?php foreach ($books as $book) { ?>
            <?php if (Yii::$app->user->identity->role == 1): ?>
                        <?php $return_date = date('m/d/Y',$book->booktransfer[0]->return_date) ;
                                $current_date = date('m/d/Y',time()) ?>
                        <?php if ($return_date == $current_date): ?>
                            <div class="col-lg-4">
                                    <h4><?php echo $book->book_title ?></h4>
                                    <p><?php echo $book->description ?></p>
                                    <p><?php echo $book->booktransfer[0]->user->profile->firstname . " ". $book->booktransfer[0]->user->profile->lastname;  ?></p>
                            </div>
                        <?php endif; ?>
                <?php else: ?>
                        <?php foreach ($user_books as $user_book): ?>
                            <div class="col-lg-4">
                                    <h4><?php echo $user_book->book->book_title ?></h4>
                                    <p><?php echo $user_book->book->description ?></p>
                            </div>
                           <!--  <pre>

                           <?php //var_dump( $user_book) ?>
                           </pre> -->
                        <?php endforeach ?>

                 <?php endif; ?>
        <?php } ?>
        </div>
    </div>
</div>
