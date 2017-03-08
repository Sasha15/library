<?php
	require_once('./config.php');
	try {
		$token  = $_POST['stripeToken'];
		$amount = $_POST['amount'];
		$customer = \Stripe\Customer::create(array(
			'email' => $_POST["stripeEmail"],
			'source'  => $token
		));
		$charge = \Stripe\Charge::create(array(
			'customer' => $customer->id,
			'amount'   => $amount,
			'currency' => 'usd'
		));
		echo "<h1>Your payment has been completed.</h1>";

	}catch(Stripe_CardError $e) {

	}catch (Stripe_InvalidRequestError $e) {
		echo  "Invalid parameters were supplied to Stripe's API";
	} catch (Stripe_AuthenticationError $e) {
		echo "Authentication with Stripe's API failed (maybe you changed API keys recently)";
	} catch (Stripe_ApiConnectionError $e) {
		 echo "Network communication with Stripe failed";
	} catch (Stripe_Error $e) {
		echo "Display a very generic error to the user, and maybe send yourself an email";
	} catch (Exception $e) {
		 echo "Something else happened, completely unrelated to Stripe";
	}
?>