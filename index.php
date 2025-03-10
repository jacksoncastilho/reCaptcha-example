<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reCaptcha</title>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
<body>
    <form id="some-form" method="POST">
        <div class="g-recaptcha" data-sitekey="your_public_key"></div>
        <br/>
        <button>Submit</button>
    </form>
</body>
</html>

<?php
    if($_POST) {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => [
                'secret' => 'your_private_key',
                'response' => $_POST['g-recaptcha-response'] ?? ''
            ]
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        echo "</br>";
        print_r($response);
    }
?>
