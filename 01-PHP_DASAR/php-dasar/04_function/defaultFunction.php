<?php
// function date();
// waktu saat ini
echo date("l, d M Y ");

// time()
// 100 hari ke depan
echo date("l, d M Y ", time()+60*60*24*200);

// mktime()
// mengetahui hari tanggal lahir
// jam, menit, detik, bulan, tanggal, tahun
echo date("l ",mktime(0, 0, 0, 6, 23, 2001));

// strtotime() 
echo date("l", strtotime("23 jun 2001"));

?>