<?php
/*
* CnabPHP - Geração de arquivos de remessa e retorno em PHP
*
* LICENSE: The MIT License (MIT)
*
* Copyright (C) 2013 Ciatec.net
*
* Permission is hereby granted, free of charge, to any person obtaining a copy of this
* software and associated documentation files (the "Software"), to deal in the Software
* without restriction, including without limitation the rights to use, copy, modify,
* merge, publish, distribute, sublicense, and/or sell copies of the Software, and to
* permit persons to whom the Software is furnished to do so, subject to the following
* conditions:
*
* The above copyright notice and this permission notice shall be included in all copies
* or substantial portions of the Software.
*
* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED,
* INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A
* PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
* HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
* OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
* SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

namespace CnabPHP\samples;

use \CnabPHP\Retorno;

include("../autoloader.php");
$fileContent = file_get_contents("retorno_cnab240_caixa.ret");

$arquivo = new Retorno($fileContent);

$registros = $arquivo->getRegistros();
foreach ($registros as $registro) {
    if ($registro->R3U->codigo_movimento == 6) {
        $data = [
            'carteira' => $registro->carteira,
            'nossoNumero' => $registro->nosso_numero,
            'tipoRegistro' => $registro->R3U->tipo_registro,
            'tipoInscricaoEmpresa' => $registro->tipo_inscricao,
            'numeroInscricaoEmpresa' => $registro->numero_inscricao,
            'agencia' => $registro->agencia,
            'seuNumero' => $registro->seu_numero,
            'carteira' => $registro->carteira,
            'codigoMovimento' => $registro->R3U->codigo_movimento,
            'dataOcorrencia' => $registro->R3U->data_ocorrencia,
            'dataVencimento' => $registro->data_vencimento,
            'valor' => $registro->R3U->vlr_liquido,
            'valorRecebido' => $registro->R3U->vlr_pago,
            'codigoBanco' => $registro->R3U->codigo_banco,
            'agenciaRecebedora' => $registro->agencia_recebedora,
            'agenciaRecebedora_dv' => $registro->dv_agencia_receb,
            'vlrIof' => $registro->R3U->vlr_IOF,
            'vlrAbatimento' => $registro->R3U->vlr_abatimento,
            'vlrDesconto' => $registro->R3U->vlr_desconto,
            'vlrPago' => $registro->R3U->vlr_pago,
            'vlrJurosMulta' => $registro->R3U->vlr_juros_multa,
            'vlrOutros' => $registro->R3U->vlr_outros_creditos,
            'nomePagador' => $registro->nome_pagador,
            'numeroRegistro' => $registro->numero_registro,
        ];
        print_r($data);
    }
}
