<?php
date_default_timezone_set('Asia/Jakarta');

error_reporting(0);
if (!file_exists('token')) {
    mkdir('token', 0777, true);
}

include ("function.php");




echo "\e[96m  |  Auto Create Gojek X Redeem GofoodBoba 20k X Redeem Goride 10k|\n";
echo "\e[96m  |  Recode By   : DkzGanteng                                     |\n";
echo "\e[96m  |  Waktu       : ".date('d-m-Y H:i:s')."                        |\n";
echo "\e[96m  |  Informasi   : Input Nomor Untuk Indo 08 dan US 1 Tanpa+      |\n";

echo "\e[96m[?] Nomor ? : ";
$nope = trim(fgets(STDIN));
$register = register($nope);
if ($register == false)
    {
    echo "\e[96m[!] Nomor sudah terdaftar lur ganti nomer lain!!\n";
    }
  else
    {
    otp:
    echo "\e[96m[?] Masukkin OTPmu Lur ? : ";
    $otp = trim(fgets(STDIN));
    $verif = verif($otp, $register);
    if ($verif == false)
        {
        echo "\e[96m[!] OTP Salah , Coba Lagi Lur !\n";
        goto otp;
        }
      else
        {
        file_put_contents("token/".$verif['data']['customer']['name'].".txt", $verif['data']['access_token']);
        echo "\e[96m[!] mencoba redeem Voucher : GOFOODBOBA07 !\n";
        sleep(3);
        $claim = claim($verif);
        if ($claim == false)
            {
            echo "\e[96m[!]".$voucher."\n";
            sleep(3);
            echo "\e[96m[!] mencoba redeem Voucher : GOFOODBOBA10 !\n";
            sleep(3);
            goto next;
            }
            else{
                echo "\e[96m[+] ".$claim."\n";
                sleep(3);
                echo "\e[96m[!] mencoba redeem Voucher : COBAINGOJEK !\n";
                sleep(3);
                goto ride;
            }
            next:
            $claim = claim1($verif);
            if ($claim == false) {
                echo "\e[96m[!]".$claim['errors'][0]['message']."\n";
                sleep(3);
                echo "\e[96m[!] mencoba redeem Voucher : GOFOODBOBA19 !\n";
                sleep(3);
                goto next1;
            }
            else{
                echo "\e[96m[+] ".$claim."\n";
                sleep(3);
                echo "\e[96m[!] mencoba redeem Voucher : COBAINGOJEK !\n";
                sleep(3);
                goto ride;
            }
            next1:
            $claim = claim2($verif);
            if ($claim == false) {
                echo "\e[96m[!]".$claim['errors'][0]['message']."\n";
                sleep(3);
                echo "\e[96m[!] mencoba redeem Voucher : COBAINGOJEK !\n";
                sleep(3);
                goto ride;
            }
          else
            {
            echo "\e[96m[+] ".$claim . "\n";
            sleep(3);
            echo "\e[96m[!] mencoba redeem Voucher : COBAINGOJEK !\n";
            sleep(3);
            goto ride;
            }
            ride:
            $claim = ride($verif);
            if ($claim == false ) {
                echo "\e[96m[!]".$claim['errors'][0]['message']."\n";
                sleep(3);
                echo "\e[96m[!] mencoba redeem Voucher : AYOCOBAGOJEK !\n";
                sleep(3);

            }
            else{
                echo "\e[96m[+] ".$claim."\n";
                sleep(3);
                echo "\e[96m[!] mencoba redeem Voucher : AYOCOBAGOJEK !\n";
                sleep(3);
                goto jajan;
            }
            jajan:
            $claim = ayocoba($verif);
            if ($claim == false ) {
                echo "\033[!] Gagal Redeem lur\n";
            }
            else{
                echo "\e[96m[+] ".$claim."\n";
                
        }
    }
    }


?>