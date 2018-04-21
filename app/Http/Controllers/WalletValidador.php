<?php

namespace App\Http\Controllers;

class WalletValidador
{
    public static function base58_permutation($char, $reverse = false){
        $table = array('1','2','3','4','5','6','7','8','9','A','B','C','D',
                       'E','F','G','H','J','K','L','M','N','P','Q','R','S','T','U','V','W',
                       'X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','m','n','o',
                       'p','q','r','s','t','u','v','w','x','y','z'
                 );

        if($reverse)
        {
            $reversedTable = array();
            foreach($table as $key => $element)
            {
                $reversedTable[$element] = $key;
            }

            if(isset($reversedTable[$char]))
                return $reversedTable[$char];
            else
                return null;
        }

        if(isset($table[$char]))
            return $table[$char];
        else
            return null;
    }

    public static function base58_decode($encodedData, $littleEndian = true){
        $res = gmp_init(0, 10);
        $length = strlen($encodedData);
        if($littleEndian)
        {
            $encodedData = strrev($encodedData);
        }

        for($i = $length - 1; $i >= 0; $i--)
        {
            $res = gmp_add(
                           gmp_mul(
                                   $res,
                                   gmp_init(58, 10)
                           ),
                           WalletValidador::base58_permutation(substr($encodedData, $i, 1), true)
                   );
        }

        $res = gmp_strval($res, 16);
        $i = $length - 1;
        while(substr($encodedData, $i, 1) == '1')
        {
            $res = '00' . $res;
            $i--;
        }

        if(strlen($res)%2 != 0)
        {
            $res = '0' . $res;
        }

        return $res;
    }

    public static function validateAddress($address){
        $address    = hex2bin(WalletValidador::base58_decode($address));
        if(strlen($address) != 25)
            return false;
        $checksum   = substr($address, 21, 4);
        $rawAddress = substr($address, 0, 21);
        $sha256		= hash('sha256', $rawAddress);
        $sha256		= hash('sha256', hex2bin($sha256));

        if(substr(hex2bin($sha256), 0, 4) == $checksum)
            return true;
        else
            return false;
    }
    
}
