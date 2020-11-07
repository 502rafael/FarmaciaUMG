<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">



    <title>Farmacia Sales Force</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body>
     
        <div class="jumbotron">
                <br>
                <h3 class="text-xl-center display-4" >DATOS DE PAGO</h3>
       
            <hr class="my-4">
            
                @foreach ( session('cart') as $id => $details) 
                <h6 class="text-xl-center"> <strong>{{ $details['nombre'] }}</strong> </h6>
                <h6 class="text-xl-center">{{  $details['precio']  * $details['cantidad'] }}</h6>
                @endforeach

                <h4 class="text-xl-center">Total a Pagar: {{ $total }}</h4>
                <br>
                <br>

                <div id="paypal-button-container" class="text-xl-center"></div>

        </div>

 

    <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>

    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '0.01'
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                   
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                });
            }


        }).render('#paypal-button-container');
    </script>


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>






</body>
</html>