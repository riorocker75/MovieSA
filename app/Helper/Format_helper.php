<?php

function format_tanggal($tanggal){
    $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

function format_notif_jam($timestamp){  
    $time_ago = strtotime($timestamp);  
    $current_time = time();  
    $time_difference = $current_time - $time_ago;  
    $seconds = $time_difference;  
    $minutes      = round($seconds / 60 );        // value 60 is seconds  
    $hours        = round($seconds / 3600);       //value 3600 is 60 minutes * 60 sec  
    $days         = round($seconds / 86400);      //86400 = 24 * 60 * 60;  
    $weeks        = round($seconds / 604800);     // 7*24*60*60;  
    $months       = round($seconds / 2629440);    //((365+365+365+365+366)/5/12)*24*60*60  
    $years        = round($seconds / 31553280);   //(365+365+365+365+366)/5 * 24 * 60 * 60  
    if($seconds <= 60) {  
     return "Baru Saja";  
    } else if($minutes <=60) {  
     if($minutes==1){  
       return "1 menit lalu";  
     }else {  
       return "$minutes menit lalu";  
     }  
    } else if($hours <=24) {  
     if($hours==1) {  
       return "sejam lalu";  
     } else {  
       return "$hours jam lalu";  
     }  
    }else if($days <= 7) {  
     if($days==1) {  
       return "kemarin";  
     }else {  
       return "$days hari lalu";  
     }  
    }else if($weeks <= 4.3) {  //4.3 == 52/12
     if($weeks==1){  
       return "minggu lalu";  
     }else {  
       return "$weeks minggu lalu";  
     }  
    } else if($months <=12){  
     if($months==1){  
       return "sebulan lalu";  
     }else{  
       return "$months bulan lalu";  
     }  
    }else {  
     if($years==1){  
       return "setahun lalu";  
     }else {  
       return "$years tahun lalu";  
     }  
    }  
} 

function status_bayar_pinjaman($status){
    switch($status){
        case 0:
            echo "<label class='badge badge-primary'>Tahap Ajukan</label>";
        break;
        case 1:
            echo "<label class='badge badge-warning'>Masa Angsuran</label>";
        break;
        case 2:
            echo"<label class='badge badge-success'>Lunas</label>";
        break;
        default:
        echo "none ";
        break;
    }
}

function cek_status_anggota($status){
    switch($status){
        case 0:
        echo "<label class='badge badge-warning'>Sedang Tahap Review</label>";
        break;
        case 1:
        echo "<label class='badge badge-success'>Telah Aktif</label>";
        break;
        case 2:
        echo "<label class='badge badge-default'>Akun Ditolak</label>";
        break;
        default:
        echo "none ";
        break;
    }
}

function cek_status_simpanan($status){
    switch($status){
        case 0:
            echo '<label class="badge badge-danger">Non aktif</label>';
        break;
        case 1:
            echo '<label class="badge badge-success">Aktif</label>';
        break;
        case 3:
            echo '<label class="badge badge-danger">Tutup Rekening</label>';
        break;
        default:
            echo "tidak ada";
         break;
    }
}

function jenis_sukarela($kode){
    switch($kode){
        case 1:
            echo "Simpanan Sukarela";
        break;
        case 2:
            echo"Simpanan Wajib";
        break;
        default:
        echo "Simpanan Lainya";
    break;
    }
}

function status_kas($status){
    switch($status){
        case 1:
            echo "<label class='badge badge-success'>Aktif</label>";
        break;
        case 0: 
            echo "<label class='badge badge-danger'> Non Aktif</label>";
        break;
        default:
    break;
    }
}


function status_metode($status){
    switch($status){
        case 1:
            echo "<label class='badge badge-success'>Langsung</label>";
        break;
        case 2: 
            echo "<label class='badge badge-primary'> Transfer</label>";
        break;
        default:
    break;
    }
}



function preview_file($nama_file){ /*ini menggunakanan paramerter $nama_file*/
    $url_sh=substr($nama_file,0,-4);
    $url_klik= url('upload/'.$nama_file);
    // ini link dari route
    $url_pdf=url('upload/'.$url_sh);
    
    $link_image="window.open('".$url_klik."','popup','width=600,height=600,scrollbars=no,resizable=no'); return false;";
    $link_pdf="window.open('".$url_pdf.".pdf','popup','width=600,height=600,scrollbars=no,resizable=no'); return false;";

    $file_path = pathinfo(storage_path().'/upload/'.$nama_file);
    switch(strtolower($file_path['extension'])){
        case"jpg":case"png":case"jpeg":
            echo '
            <a href="" onclick="'.$link_image.'">';
            echo "<img src='$url_klik' style='width:50px; height:50px'><br/>";
            echo "klik untuk detail";
            echo "</a>";
        break;
        case"pdf":
            echo '
            <a href="" onclick="'.$link_pdf.'">';
            
            echo "<i class='fas fa-file-pdf' style='font-size:50px;color:#D81F28'></i><br/>";
            echo "Klik Untuk Lebih Detail<br>";
            echo "Matikan IDM atau sejenisnya";

            echo "</a>";
        break;	
        default:
        echo "File tidak ditemukan";
        break;	

    }
}

// end preview syarat

// start perview bukti

function preview_bukti($nama_file){ /*ini menggunakanan paramerter $nama_file*/
    $url_sh=substr($nama_file,0,-4);
    $url_klik= url('upload/bukti_bayar/'.$nama_file);
    // ini link dari route
    $url_pdf=url('review/bukti/'.$url_sh);
    
    $link_image="window.open('".$url_klik."','popup','width=600,height=600,scrollbars=no,resizable=no'); return false;";
    $link_pdf="window.open('".$url_pdf."','popup','width=600,height=600,scrollbars=no,resizable=no'); return false;";

    $file_path = pathinfo(storage_path().'/upload/bukti_bayar/'.$nama_file);
    switch(strtolower($file_path['extension'])){
        case"jpg":case"png":case"jpeg":
            echo '
            <a href="" onclick="'.$link_image.'">';
            echo "<img src='$url_klik' style='width:100px; height:100px'><br/>";
            echo "Klik Untuk Lebih Detail";
            echo "</a>";
        break;
        case"pdf":
            echo '
            <a href="" onclick="'.$link_pdf.'">';
            
            echo "<i class='fas fa-file-pdf' style='font-size:100px;color:#D81F28'></i><br/>";
            echo "Klik Untuk Lebih Detail<br>";
            echo "Matikan IDM atau sejenisnya";

            echo "</a>";
        break;	
        default:
        echo "File tidak ditemukan";
        break;	

    }
}
// end perview bukti

