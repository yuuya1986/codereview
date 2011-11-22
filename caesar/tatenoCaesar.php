<?php
/**
 * 11新卒コードレビュー
 * Caesar暗号を解読するプログラムを作り,暗号を解読してください。暗号鍵（何文字ずらすか）は不明です。
 */

// 暗号文
$cipText = "yWNh'bVVN.hMJfhkURLNhdJ'h'RaaRWPhXWhaQNh.RcN.KJWThdRaQhQN.hXUMN.h'R'aN.HhkURLNI'h'R'aN.hdJ'h.NJMRWPhJhKXXThJWMhkURLNhWXaRLNMhaQJahaQNhKXXThMRMWIahQJcNhJWfhYRLab.N'ihdQRLQhVJMNhkURLNhUX'NhRWaN.N'ahRWhRaHhAQNWhJ'h'QNhUXXTNMhXbahRWaXhaQNhVNJMXdih'QNh'Jdh'XVNaQRWPhcN.fhYNLbURJ.Hh?QNh'JdhJhUJ.PNhdQRaNh.JKKRah.bWWRWPhYJ'ahQN.hUXXTRWPhJahQR'hdJaLQh'JfRWPhIyQhMNJ.hyQhMNJ.hsh'QJUUhKNhaXXhUJaNHIhAQNWhQNhYXYYNMhMXdWhJh.JKKRahQXUNHhkURLNihKNRWPhaQNhLb.RXb'hPR.Uh'QNhdJ'ihOXUUXdNMhaQNh.JKKRahMXdWhaQJahQXUNhJWMhOXbWMhQN.'NUOhRWhJhUJWMhdRaQhVJWfhdXWMN.'HhsahdJ'hJhdXWMN.UJWMHh?QNhVNah'XVNhRWaN.N'aRWPhL.NJab.N'hRWLUbMRWPhaQNhuRWPhJWMh bNNWhXOhrNJ.a'ihaQNhrJaaN.ihJWMhaQNhwJ.LQhrJ.NHh?QNhOXbWMhaQJahVJWfhL.NJab.N'hRWhaQR'hUJWMhMRMWIahQJcNhaQNhKN'ahXOhaNVYN.'hJWMhMRMWIahdJWahaXha.fhaXhQNUYhkURLNhORPb.NhXbahdQN.NhaXhPXhJWMhdQJahaXhMXHhkURLNhJU'XhOXbWMhQN.'NUOhLQJWPRWPh'RgN'hJOaN.hNJaRWPhX.hM.RWTRWPhaQRWP'h'QNhOXbWMHhyWNhVRWbaNh'QNhdJ'hJhONdhRWLQN'haJUUhJWMhaQNhWNeah'QNhdJ'hWRWNhONNahaJUUHhDQNWhkURLNhdJ'hRWhaQR'hUJWMh'QNhNeYNLaNMhaQNhbWNeYNLaNMhJWMhMRMWIahaQRWThVbLQhXOhaQNhbWb'bJUhXLLb..NWLN'Hh?QNhb'NMhQN.hTWXdUNMPNhaXhQNUYhXaQN.hYNXYUNih'bLQhJ'hdQNWh'QNhVJMNh'NW'NhXOhNcRMNWLNhMb.RWPhJha.RJUHhk'hVbLQhJ'hkURLNhaQXbPQahRahRWaN.N'aRWPhKNRWPhdRaQhaQN'Nh'a.JWPNhL.NJab.N'hJWMha.fRWPhaXhPNahJUXWPhdRaQhaQNVih'QNhdXWMN.NMhdQNWh'QNhdXbUMh.Nab.WhQXVNhaXhQN.hWX.VJUhURONhX.hROh'QNhdXbUMHh?QNh.NVNVKN.NMhQN.hLJahJWMhM.NJVNMhXOh'NNRWPhQRVhJPJRWHhlbahdJ'haQN.NhJhdJfhaXhPNahXbahX.hdJ'hRahJUUhSb'ahJhM.NJVj";

// 使用される文字の列
$code = "aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ .,'?";
// ok = "tTuUvVwWxXyYzZ .,'?aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsS";

// main
for ($i = 1; $i<strlen($code); $i++) {
    $chipCodes = getChipTable($code, $i);
    $text = getPlainText($cipText, $chipCodes);
    // 英文なら「 the 」を使ってるよね
    if (strpos($text, ' the ') !== false) {
        var_dump($chipCodes);
        echo $text ."\n";
        exit;
    }
}
exit;

// 復元のための連想配列（変換テーブル）取得（$gapNumで何文字ずらすか指定）
function getChipTable($baseCode, $gapNum)
{
    $chipTable = array();
    for ($i = 0; $i<strlen($baseCode); $i++) {
        $chipTable[$baseCode[$i]] = $baseCode[($i+$gapNum)%strlen($baseCode)];
    }
    return $chipTable;
}

// 復元処理
function getPlainText($cipText, $chipCodes)
{
    $outText = '';
    for ($i = 0; $i<strlen($cipText); $i++) {
        $outText .= $chipCodes[$cipText[$i]];
    }
    return $outText;
}
