<?php


$keywords = "aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ .,-'?";
$cryptogram = "yWNh'bVVN.hMJfhkURLNhdJ'h'RaaRWPhXWhaQNh.RcN.KJWThdRaQhQN.hXUMN.h'R'aN.HhkURLNI'h'R'aN.hdJ'h.NJMRWPhJhKXXThJWMhkURLNhWXaRLNMhaQJahaQNhKXXThMRMWIahQJcNhJWfhYRLab.N'ihdQRLQhVJMNhkURLNhUX'NhRWaN.N'ahRWhRaHhAQNWhJ'h'QNhUXXTNMhXbahRWaXhaQNhVNJMXdih'QNh'Jdh'XVNaQRWPhcN.fhYNLbURJ.Hh?QNh'JdhJhUJ.PNhdQRaNh.JKKRah.bWWRWPhYJ'ahQN.hUXXTRWPhJahQR'hdJaLQh'JfRWPhIyQhMNJ.hyQhMNJ.hsh'QJUUhKNhaXXhUJaNHIhAQNWhQNhYXYYNMhMXdWhJh.JKKRahQXUNHhkURLNihKNRWPhaQNhLb.RXb'hPR.Uh'QNhdJ'ihOXUUXdNMhaQNh.JKKRahMXdWhaQJahQXUNhJWMhOXbWMhQN.'NUOhRWhJhUJWMhdRaQhVJWfhdXWMN.'HhsahdJ'hJhdXWMN.UJWMHh?QNhVNah'XVNhRWaN.N'aRWPhL.NJab.N'hRWLUbMRWPhaQNhuRWPhJWMh bNNWhXOhrNJ.a'ihaQNhrJaaN.ihJWMhaQNhwJ.LQhrJ.NHh?QNhOXbWMhaQJahVJWfhL.NJab.N'hRWhaQR'hUJWMhMRMWIahQJcNhaQNhKN'ahXOhaNVYN.'hJWMhMRMWIahdJWahaXha.fhaXhQNUYhkURLNhORPb.NhXbahdQN.NhaXhPXhJWMhdQJahaXhMXHhkURLNhJU'XhOXbWMhQN.'NUOhLQJWPRWPh'RgN'hJOaN.hNJaRWPhX.hM.RWTRWPhaQRWP'h'QNhOXbWMHhyWNhVRWbaNh'QNhdJ'hJhONdhRWLQN'haJUUhJWMhaQNhWNeah'QNhdJ'hWRWNhONNahaJUUHhDQNWhkURLNhdJ'hRWhaQR'hUJWMh'QNhNeYNLaNMhaQNhbWNeYNLaNMhJWMhMRMWIahaQRWThVbLQhXOhaQNhbWb'bJUhXLLb..NWLN'Hh?QNhb'NMhQN.hTWXdUNMPNhaXhQNUYhXaQN.hYNXYUNih'bLQhJ'hdQNWh'QNhVJMNh'NW'NhXOhNcRMNWLNhMb.RWPhJha.RJUHhk'hVbLQhJ'hkURLNhaQXbPQahRahRWaN.N'aRWPhKNRWPhdRaQhaQN'Nh'a.JWPNhL.NJab.N'hJWMha.fRWPhaXhPNahJUXWPhdRaQhaQNVih'QNhdXWMN.NMhdQNWh'QNhdXbUMh.Nab.WhQXVNhaXhQN.hWX.VJUhURONhX.hROh'QNhdXbUMHh?QNh.NVNVKN.NMhQN.hLJahJWMhM.NJVNMhXOh'NNRWPhQRVhJPJRWHhlbahdJ'haQN.NhJhdJfhaXhPNahXbahX.hdJ'hRahJUUhSb'ahJhM.NJVj";


$doubleKeywords  = $keywords . $keywords;
$devidedKeywords = str_split($doubleKeywords);
$countKeywords   = count($keywords);

for($gapNum = 1; $gapNum < $countKeywords; $gapNum++){
    echo '<hr />' . $gapNum . '文字ずらした結果<br />';
    
    for($i = 0; $i <= strlen($cryptogram); $i++){
        $cutword = substr($cryptogram, $i, 1);
        $result = '';
    
        for($j = 0; $j < $countKeyword; $j++){
            if($word === $devidedKeywords[$j]){
                $correspondWordNum = $j + $gapNum;
            
                $result .= $devidedKeywords[$correspondWordNum];
                echo  $result;
                continue;
            }
        }
    }
}
