<?php
function mamdaniTest($umur, $kategoriFilm)
{
    // Definisikan derajat keanggotaan fuzzy untuk umur 13+ .17+, 21+
    $remaja = max(0, min(($umur - 13) / (17 - 13), (17 - $umur) / (17 - 13))); // 13+ sama 17+
    $dewasaMuda = max(0, min(($umur - 17) / (21 - 17), (21 - $umur) / (21 - 17))); // 117+ sama 21+
    $dewasa = max(0, min(($umur - 21) / (25 - 21), 1));  // Umur di atas 21 dianggap dewasa

    // Aturan fuzzy
    // misal umur 15 tahun
    if ($kategoriFilm == "13+") {
        $kelayakanBoleh = max($remaja, $dewasaMuda, $dewasa);// untuk bisa di tonton dia nilai max lebih besar 0
    } elseif ($kategoriFilm == "17+") {
        $kelayakanBoleh = max($dewasaMuda, $dewasa);
    } elseif ($kategoriFilm == "21+") {
        $kelayakanBoleh = $dewasa;
    } else {
        $kelayakanBoleh = 0;  // Tidak boleh menonton jika kategori tidak sesuai
    }

    // Kelayakan tidak boleh adalah kebalikannya
    $kelayakanTidakBoleh = 1 - $kelayakanBoleh;

    // Inferensi Mamdani (pilih yang nilai kelayakannya lebih tinggi)
    if ($kelayakanBoleh > $kelayakanTidakBoleh) {
        return "Boleh Menonton";
    } else {
        return "Tidak Boleh Menonton";
    }
}


function mamdaniRekomendasi($umur)
{
    $remaja = max(0, min(($umur - 13) / (17 - 13), (17 - $umur) / (17 - 13)));
    $dewasaMuda = max(0, min(($umur - 17) / (21 - 17), (21 - $umur) / (21 - 17)));
    $dewasa = max(0, min(($umur - 21) / (25 - 21), 1)); 
    $kat =[];
    if ($remaja > 0) {
        return ['13'];
    } elseif ($dewasaMuda > 0) {
        return ['13', '17'];
    } elseif ($dewasa > 0) {
        return ['13', '17', '21'];
    } else {
        return [];
    }
}

function mamdaniFilm($umur, $kategoriFilm)
{
    $remaja = max(0, min(($umur - 13) / (17 - 13), (17 - $umur) / (17 - 13)));
    $dewasaMuda = max(0, min(($umur - 17) / (21 - 17), (21 - $umur) / (21 - 17)));
    $dewasa = max(0, min(($umur - 21) / (25 - 21), 1)); 

    if ($kategoriFilm == '13+' && $remaja > 0) {
        return true;
    } elseif ($kategoriFilm == '17+' && $dewasaMuda > 0) {
        return true;
    } elseif ($kategoriFilm == '21+' && $dewasa > 0) {
        return true;
    } else {
        return false;
    }
}


function mamdaniCek($umur)
{
    $kategori_umur = [];

    // Hitung derajat keanggotaan fuzzy
    $remaja = max(0, min(($umur - 13) / (17 - 13), (17 - $umur) / (17 - 13)));
    $dewasaMuda = max(0, min(($umur - 17) / (21 - 17), (21 - $umur) / (21 - 17)));
    $dewasa = max(0, min(($umur - 21) / (25 - 21), 1)); 

    // Periksa dan tambahkan kategori ke array
    if ($remaja > 0) {
        $kategori_umur[] = '13';
    }
    if ($dewasaMuda > 0) {
        $kategori_umur[] = '13';
        $kategori_umur[] = '17';
    }
    if ($dewasa > 0) {
        $kategori_umur[] = '21';
    }

    return $kategori_umur;
}