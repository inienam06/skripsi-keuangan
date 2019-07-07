<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use App\Users;

    function random_num($max)
    {
        $alphabet = "0123456789";
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 1; $i <= $max; $i++) {
            $n = rand(1, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        $password =  implode($pass);

        return $password;
    }

    function random_intchar($max)
    {
        $alphabet = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 1; $i <= $max; $i++) {
            $n = rand(1, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        $password =  implode($pass);

        return $password;
    }

    function custom_crypt($message, $tipe = 'e')
    {
        // you may change these values to your own
        $secret_key = 'keuangansd';
        $secret_iv = 'keuangansd';
    
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $key = hash( 'sha256', $secret_key );
        $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
    
        if( $tipe == 'e' ) {
            $output = base64_encode( openssl_encrypt( $message, $encrypt_method, $key, 0, $iv ) );
        }
        else if( $tipe == 'd' ){
            $output = openssl_decrypt( base64_decode( $message ), $encrypt_method, $key, 0, $iv );
        }

        return $output;
    }

    function sending_mail($to, $title, $message) {
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'jessie.id.rapidplex.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'admin@abdulr.id';                 // SMTP username
            $mail->Password = 'abdulr181199';                           // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                    // TCP port to connect to
    
            //Recipients
            $mail->setFrom('noreply@abdulr.id', 'Admin Clean Today');
            $mail->addAddress($to);
    
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $title;
            $mail->Body    = $message;
    
            $mail->send();
            
            $res['status'] = true;
            $res['code'] = 200;
            $res['message'] = 'E-mail has been sent';
        } catch (Exception $e) {
            $res['status'] = false;
            $res['code'] = 500;
            $res['message'] = 'E-mail not sent';
        }
    
        return response()->json($res);
    }