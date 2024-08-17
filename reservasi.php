<?php
require_once "./coneksi.php";

$data = [];


$datas = Coneksi::getId((int)$_GET["id"])->get_result();


if ($datas->num_rows > 0) {
    while ($result = $datas->fetch_assoc()) {
        $data[] = $result;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="w-full h-[100vh] flex justify-center flex-col items-center">
        <table class="max-w-2xl w-full">
            <thead>
                <tr class="bg-slate-200">
                    <th colspan="2" class="py-6">Rangkuman Reservasi Paket Wisata</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $value) {

                    echo "<tr class='border-b-2 border-dashed'>
                    <td class='py-4'>Nama</td>
                    <td class='py-4'>{$value['nama']}</td>
                </tr>
                <tr class='border-b-2 border-dashed'>
                    <td class='py-4'>Jumlah Peserta</td>
                    <td class='py-4'>{$value['j_pesanan']} orang</td>
                </tr>
                <tr class='border-b-2 border-dashed'>
                    <td class='py-4'>Waktu perjalanan</td>
                    <td class='py-4'>{$value['durasi']} hari</td>
                </tr>
                <tr class='border-b-2 border-dashed'>
                    <td class='py-4'>Layanan Paket</td>
                    <td class='py-4'>{$value['layanan']}</td>
                </tr>
                <tr class='border-b-2 border-dashed'>
                    <td class='py-4'>Harga Paket</td>
                    <td class='py-4'>Rp.{$value['harga_paket']}</td>
                </tr>
                <tr>
                    <td class='py-4'>Jumlah Tagihan</td>
                    <td class='py-4'>Rp.{$value['jumlah_tagihan']}</td>
                </tr>";
                }

                ?>
            </tbody>
        </table>
        <div class="flex gap-4">
            <a href="add_data.php">
                <button class="py-2 w-24 bg-blue-600 text-white">
                    Pesan Lagi
                </button>
            </a>
            <a href="index.php">

                <button class="py-2 w-24 border-2 border-blue-600">Tidak
                </button>
            </a>

        </div>
    </div>

</body>

</html>