<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<script src="https://www.paypal.com/sdk/js?client-id=AU2fyDOAr25kWnJpR-g3vmIL6kYu7qej0YRVUzAQ76j_PlakLZRuVSMVtP67EEAZqkPMDnJlN38G5QLi"></script>

</head>
<body>
    <div id="paypal-button-container"></div>

    <script>

    paypal.Buttons({
        style:{
            color: 'blue',
            shape: 'pill',
            label: 'pay',
        },
        createOrder: function(data, actions) {//unidades de pago
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '0.01'
                    }
                }]
            });
        },

        onApprove: function(data, actions) { //pago completado
            actions.order.capture().then(function(details) {
                window.location.href = "completado.html";
            });
        },

        onCancel: function(data) { //pago cancelado
            alert('Pago cancelado');
            console.log(data);
        },
    }).render('#paypal-button-container'); //Renderizar el botón en el contenedor especificado

    </script>
</body>
</html>