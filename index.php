<?php


require_once "./coneksi.php";

$data = [];


$datas = Coneksi::getData();

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
    <div class="px-32 w-full h-[100vh] flex flex-col justify-center">
        <a href="add_data.php">
            <button class='px-10 py-1 rounded-md bg-blue-600 text-white max-w-xs mb-4'>
                Tambah Data
            </button>
        </a>
        <table class="table-auto w-full text-center">
            <thead>
                <tr class="bg-slate-400">
                    <th class="py-4">No</th>
                    <th>Nama Pemesan</th>
                    <th>No.Telpon</th>
                    <th>Durasi Perjalanan</th>
                    <th>jumlah Peserta</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($datas as $data) {
                    echo " <tr class=' even:bg-slate-100'>
                    <td class='py-4'>{$data['id']}.</td>
                    <td>{$data['nama']}</td>
                    <td>{$data['n_hp']}</td>
                    <td>{$data['durasi']}</td>
                    <td>{$data['j_pesanan']}</td>
                    <td>
                        <button class='px-10 py-1 rounded-md bg-blue-600 text-white'>Ubah</button>
                        <button class='px-10 py-1 rounded-md bg-red-600 text-white'>Hapus</button>
                    </td>
                </tr>";
                }
                ?>

            </tbody>
        </table>
    </div>

</body>

</html>