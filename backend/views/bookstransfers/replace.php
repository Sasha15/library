<?php
	require_once('config.php');
?>
	<h1>Penalty for delay <?php echo $diff_day. " " ?> delay in sum <?php echo $amount ?></h1>
	<form action="charge.php" method="POST">
		<script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="<?php echo Yii::$app->params['stripe']['publishable_key']; ?>" data-amount="<?php echo $amount ?>" data-name="Library" data-description="Penalty for  <?php echo $diff_day. " " ?> delay in sum <?php echo $amount ?>" data-image="https://s-media-cache-ak0.pinimg.com/originals/0a/cd/50/0acd5002683fbcf2b720004f201ee530.jpg" data-locale="auto">
		</script>
		<input type="hidden" name="amount" value="<?php echo $amount ?>" />
	</form>
		<?php
