<h1> Informasi Alumni </h1>
<?php
//Deklarasi Variabel
$namaAlumni = "Dede Irawan"
$tahunKelulusan=2005;
$statusAktif=true;
$tahunSekarang=@date("Y");

//Operator Aritmatika
$lamaKelulusan=$tahunSekarang-$tahunKelulusan;
$rasioAlumni=$jumlahLulusan5Tahun/150;//Misalkan 150 adalah total alumni
echo "<p>LamaKelulusan tahun</p>";

//Operator Penugasan dan Perbandingan
$jumlahAlumni=120;
$jumlahAlumni+=10;
if($jumlahAlumni>=130) {
    echo "<p>Jumlah alumni sudah mencukupi untuk acara reuni.</p>";
}

//Operator Logika
if($statusAktif&& $lamaKelulusan<=5) {
    echo "<p>$namaAlumni adalah alumni tidak aktif atau lulus lebbih dari 5 tahun terahir.</p>";
}

//Manipulasi String
echo "<p>Nama Lengkap:$namaAlumni</p>";
echo "<p>Nama dalam Huruf Besar:".strtoupper($namaAlumni)."</p>";
echo "<p>Nama dalam Huruf Kecil:".strtolower($namaAlumni)."</p>";

$initials = substr($namaAlumni, 0, 1).substr($namaAlumni,strpos($namaAlumni,"")+1,1);
echo "<p>Inisial:$initial</p>";
?>