<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilController extends Controller
{
    /*
     $cnpj = '11222333000199';
     $cpf = '00100200300';
     $cep = '08665110';
     $data = '10102010';
     $hora = '021050';

     echo k($cnpj, '##.###.###/####-##').'<br>';
     echo k($cpf, '###.###.###-##').'<br>';
     echo k($cep, '#####-###').'<br>';
     echo k($data, '##/##/####').'<br>';
     echo k($data, '##/##/####').'<br>';
     echo k($data, '[##][##][####]').'<br>';
     echo k($data, '(##)(##)(####)').'<br>';
     echo k($hora, 'Agora são ## horas ## minutos e ## segundos').'<br>';
     echo mask($hora, '##:##:##');
     */
    
    public function mask($val, $mask)
    {
        $maskared = '';
        $k = 0;
        for ($i = 0; $i <= strlen($mask) - 1; ++$i) {
            if ($mask[$i] == '#') {
                if (isset($val[$k])) {
                    $maskared .= $val[$k++];
                }
            } else {
                if (isset($mask[$i])) {
                    $maskared .= $mask[$i];
                }
            }
        }

        return $maskared;
    }
}
