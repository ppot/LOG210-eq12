<?php
	require_once('../controller/Orders.php');
	require_once("../partials/header.php");
?>
<?php
	$pdtToken = "k-6RHEZ4iJofn8L_ii1sJV6P7FUll0hValoWksgBlVkWVGQ0zq6-_yj_FsS";

	if(isset($_GET['tx']))
	{
	$tx = $_GET['tx'];

	$items = json_decode($_SESSION['cart']);
	$command = json_decode($_SESSION['command']);

	$order = Orders::paypalPaymentOrder($command->clientId,$command->addressId,$command->restaurantId,$tx,$command->date,$command->time,$command->total);
	foreach ($items as $item) {
		Orders::paypalPaymentItems($order->id,$item->id,$item->qte);
	}
	  // Init cURL
	$request = curl_init();

	// Set request options
	curl_setopt_array($request, array
	(
	  CURLOPT_URL => 'https://www.sandbox.paypal.com/cgi-bin/webscr',
	  CURLOPT_POST => TRUE,
	  CURLOPT_POSTFIELDS => http_build_query(array
	    (
	      'cmd' => '_notify-synch',
	      'tx' => $tx,
	      'at' => $pdtToken,
	    )),
	  CURLOPT_RETURNTRANSFER => TRUE,
	  CURLOPT_HEADER => FALSE,
	  // CURLOPT_SSL_VERIFYPEER => TRUE,
	  // CURLOPT_CAINFO => 'cacert.pem',
	));

	// Execute request and get response and status code
	$response = curl_exec($request);
	$status   = curl_getinfo($request, CURLINFO_HTTP_CODE);

	// Close connection
	curl_close($request);
	  // Further processing
	}

	if($status == 200 AND strpos($response, 'SUCCESS') === 0)
	{
	// Remove SUCCESS part (7 characters long)
		$response = substr($response, 7);

		// URL decode
		$response = urldecode($response);

		// Turn into associative array
		preg_match_all('/^([^=\s]++)=(.*+)/m', $response, $m, PREG_PATTERN_ORDER);
		$response = array_combine($m[1], $m[2]);

		// Fix character encoding if different from UTF-8 (in my case)
		if(isset($response['charset']) AND strtoupper($response['charset']) !== 'UTF-8')
		{
		  foreach($response as $key => &$value)
		  {
		    $value = mb_convert_encoding($value, 'UTF-8', $response['charset']);
		  }
		  $response['charset_original'] = $response['charset'];
		  $response['charset'] = 'UTF-8';
		}

		// Sort on keys for readability (handy when debugging)
		ksort($response);
	}
	else
	{
	    // Log the error, ignore it, whatever 
	}
	    // echo "Your payment has been successfully processed";
?>
	<div id="cart">
		<div id="login" class="col-md-9 col-md-offset-3">
	    <div  class="login-content opa">
	    	  <div>
	        	<div class="authentication-header">
	        		<h3>Cart</h3>
							<p class="info">Details de votre achat</p>
	        	</div>
	    	</div>
	    	<span class="box">
  				<div class="col-md-6">
  					<div id="order-preview">
						<span><h5>commande</h5><h6 class="pull-right">qte</h6></span>
						<div class="table-responsive">
							<table class="table">
								<tbody id="cart-items">
								<?php
									foreach ($items as $item) {
										?>
										<tr id="cart_item"<?php echo $item->id; ?>><td><?php echo $item->plat->name; ?></td><td><?php echo $item->plat->price; ?>$</td><td class="pull-right" id="qte_"<?php echo $item->id; ?>><?php echo $item->qte; ?></td></tr>
										<?php
									}
								?>
								</tbody>

								<tr><td>total</td><td></td><td class="pull-right"><span  id="cart_total"><?php echo $command->total; ?></span>$</td></tr>
							</table>

             	<div class="" id="order-success">
             		<span>livraison le :   <label id="ordeDate-success"><?php echo $command->date; ?></label></span>
             		<span>pour :   <label id="ordeTime-success"><?php echo $command->time; ?></label></span>
								<span class="box">
		          		<div class="col-md-7 col-md-offset-2 alert-success text-center space">
		          			<span id="order-success-message">
		          				votre numero de confirmation est le
		          				<?php echo $tx;?>
		          			</span>
		          		</div>
								</span>
              </div>

						</div>
					</div>
				</div>
				<div class="col-md-3">
					<span><h5>Adresse de livraison</h5></span>
					<address>
					  <strong><span>principale</span></strong><br>
					  <span id="address">adresse</span>,<span id="postalcode">code postal</span><br>
					  <span id="city">ville</span></br>	  
					  <span id="phone">telephone</span>
					</address>
    			</div>
	    	</span>
	  </div>
	</div>
</div>

<script type="text/javascript">
			$(document).ready(function(){
				$.ajax({
				    type: "GET",
				    url: app.config.getContext()+"action/api.php",
				    data:{
				    	action: 'getDeliveryAddress',				
					},
				    dataType: "html",
				    success: function(result){
				     	address = $.parseJSON(result);
		 				$('#address').text(address.address);	
	 					$('#postalcode').text(address.postalcode);
	 					$('#city').text(address.city); 	
	 					$('#phone').text(address.phone);
				    }        
				});   		
			});

</script>
<?php
	require_once("../partials/footer.php");
?>