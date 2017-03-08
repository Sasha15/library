<?php
	require_once('../../vendor/autoload.php');
	/*$stripe = array(
		"secret_key"      => "sk_test_vdvbkq8Wu9CS5BlC7LBF4GLU",
		"publishable_key" => "pk_test_rcd3y5yysxRrcNpyCtt0Zys4"
	);*/
	\Stripe\Stripe::setApiKey(Yii::$app->params['stripe']['secret_key']);
?>