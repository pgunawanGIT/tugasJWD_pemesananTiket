<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <div class="w-full h-[100vh] flex justify-center items-center">
        <div class="max-w-lg" id="message">
            <div id="error" class="py-4 bg-red-200 text-red-600 opacity-0 transition duration-200">
                <p class="text-center">Lengkapi data terlebih dahulu</p>
            </div>
            <p>
            <h1 class="text-4xl text-slate-600 bold text-center py-4">
                Form Pemesanan
            </h1>
            </p>
            <form id="form">
                <fieldset>
                    <div class="pb-2 text-slate-600">
                        <label for="namaPemesan">Nama Pemesan</label>
                        <input type="text" name="namaPemesan" class="px-4 w-full border border-gray-400 rounded-md py-2">
                    </div>
                    <div class="pb-2 text-slate-600">
                        <label for="noTelpon">No.telpon</label>
                        <input type="text" name="noTelpon" class="px-4 w-full border border-gray-400 rounded-md py-2">
                    </div>
                    <div class="pb-2 text-slate-600">
                        <label for="durasiPerjalanan">Durasi Perjalanan</label>
                        <input id="durasi" type="number" name="durasiPerjalanan" class="px-4 w-full border border-gray-400 rounded-md py-2">
                    </div>
                    <div class="flex gap-4">
                        <div class="pb-2 text-slate-600">
                            <label for="jumlahpeserta">Jumlah Peserta</label>
                            <input id="jumlah" type="number" inputmode="numeric" name="jumlahPeserta" class="px-4 w-full border border-gray-400 rounded-md py-2">
                        </div>
                        <div class="pb-2 text-slate-600">
                            <label for="diskon">Diskon</label>
                            <div class="relative flex items-center">
                                <p class="absolute text-slate-600 right-4">%</p>
                                <input type="text" name="diskon" class="px-4 w-full border border-gray-400 rounded-md py-2">
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="text-slate-600">Layanan :</p>
                        <div class="flex gap-4">
                            <div class="pb-2 text-slate-600 flex items-center gap-2">
                                <input id="penginapan" type="checkbox" name="layanan[]" value="penginapan">
                                <label for="penginapan">Penginapan</label>
                            </div>
                            <div class="pb-2 text-slate-600 flex items-center gap-2">
                                <input id="transportasi" type="checkbox" name="layanan[]" value="transportasi">
                                <label for="transportasi">Transportasi</label>
                            </div>
                            <div class="pb-2 text-slate-600 flex items-center gap-2">
                                <input id="makanan" type="checkbox" name="layanan[]" value="makanan">
                                <label for="makanan">Makanan</label>
                            </div>
                        </div>
                    </div>
                    <div class="pb-2 text-slate-600">
                        <label for="jumlahpeserta">Harga Paket Perjalanan</label>
                        <input id="hargapaket" type="text" name="hargapaket" readonly class="bg-gray-200 px-4 w-full border border-gray-400 rounded-md py-2">
                    </div>
                    <div class="pb-2 text-slate-600">
                        <label for="jumlahpeserta">Jumlah Tagihan</label>
                        <input id="jumlahtagihan" type="text" name="jumlahtagihan" readonly class="bg-gray-200 px-4 w-full border border-gray-400 rounded-md py-2">
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="bg-blue-600 text-white py-2 w-full rounded-md">Simpan</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    <!-- pemesanan tiket -->


    <script>
        const error = document.getElementById("error")
        const checkbox = document.querySelectorAll("input[type='checkbox']")
        const durasiPerjalanan = document.getElementById("durasi")
        const jumlah = document.getElementById("jumlah")
        const jumlahtagihan = document.getElementById("jumlahtagihan")
        const hargapaket = document.getElementById("hargapaket")
        let tagihan = 0
        let jumlahtg = 0
        let value = "" //nilai dari jumlahtagihan
        let currentdurasi = "" //jumlah dari durasi perjalanan
        let cuurentjumlah;
        let sumdurasi;
        jumlahtagihan.setAttribute("value", `Rp.${jumlahtg}`)
        hargapaket.setAttribute("value", `Rp.${tagihan}`)

        jumlah.addEventListener("input", function(event) {
            value = event.target.value
            cuurentjumlah = jumlahtg * value
            if (currentdurasi != "" && value == "") {
                jumlahtagihan.setAttribute("value", `Rp.${currentdurasi * jumlahtg}`)
            } else if (currentdurasi != "" && value != "") {
                jumlahtagihan.setAttribute("value", `Rp.${cuurentjumlah * currentdurasi}`)
            } else if (value != "") {
                jumlahtagihan.setAttribute("value", `Rp.${cuurentjumlah}`)
            } else {
                jumlahtagihan.setAttribute("value", `Rp.${jumlahtg}`)
            }
        })


        // duration
        durasiPerjalanan.addEventListener("input", function(event) {
            const {
                target
            } = event
            currentdurasi = target.value
            if (currentdurasi == "" && value != "") {
                jumlahtagihan.setAttribute("value", `Rp.${value * jumlahtg}`)

            } else if (currentdurasi != "" && value != "") {
                sumdurasi = value * currentdurasi * jumlahtg
                jumlahtagihan.setAttribute("value", `Rp.${sumdurasi}`)
            } else if (currentdurasi != "") {
                sumdurasi = currentdurasi * jumlahtg
                jumlahtagihan.setAttribute("value", `Rp.${sumdurasi}`)
            } else {
                jumlahtagihan.setAttribute("value", `Rp.${cuurentjumlah}`)
            }
        })

        // function
        function ubahdata() {
            hargapaket.setAttribute("value", `Rp.${tagihan}`)
            if (value != "" && currentdurasi != "") {
                jumlahtagihan.setAttribute("value", `Rp.${jumlahtg * value * currentdurasi}`)
            } else if (value != "") {
                jumlahtagihan.setAttribute("value", `Rp.${jumlahtg * value}`)
            } else if (currentdurasi != "") {
                jumlahtagihan.setAttribute("value", `Rp.${jumlahtg * currentdurasi}`)
            } else {
                jumlahtagihan.setAttribute("value", `Rp.${jumlahtg}`)
            }
        }

        checkbox.forEach((node) => {
            node.addEventListener("click", function(event) {
                switch (event.target.value) {
                    case "penginapan":
                        if (event.target.checked) {
                            tagihan += 1000000
                            jumlahtg += 1000000
                        } else {
                            tagihan -= 1000000
                            jumlahtg -= 1000000
                        }
                        ubahdata()
                        break
                    case "transportasi":
                        if (event.target.checked) {
                            tagihan += 1200000
                            jumlahtg += 1200000
                        } else {
                            tagihan -= 1200000
                            jumlahtg -= 1200000
                        }
                        ubahdata()
                        break
                    default:
                        if (event.target.checked) {
                            tagihan += 500000
                            jumlahtg += 500000
                        } else {
                            tagihan -= 500000
                            jumlahtg -= 500000
                        }
                        ubahdata()
                        break
                }
            })
        })

        document.getElementById("form").addEventListener("submit", async function(event) {
            event.preventDefault()
            let conf = confirm("simpan")
            if (!conf) {
                window.location = "add_data.php"
            }
            let value = new FormData(this)

            try {
                const _fetch = await fetch("insert.php", {
                    method: "POST",
                    body: value,
                })
                let result = await _fetch.text()
                console.log(result)
                if (_fetch.ok) {
                    location.href = `reservasi.php?id=${result}`
                } else {
                    error.classList.toggle("opacity-100")
                    setTimeout(() => {
                        error.classList.toggle("opacity-100")
                    }, 3000)
                }
            } catch (e) {
                console.log(e)
            }

        })
    </script>


</body>

</html>