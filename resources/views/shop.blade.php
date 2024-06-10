<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PenjualanRokok</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styleshop/styleshop.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href=''>WarungRokok.</a></div>
            <div class="menu">
                <ul>
                    <li><a href="index.php">Beranda</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="register.php" class="button1">Register</a></li>
                </ul>
            </div>
    </nav>
<div class="cards-categories">
    <div class="card-categories">
        <?php
        include 'koneksi.php';
        $sql = "SELECT * FROM jenis_rokok";
        $result = mysqli_query($koneksi, $sql);
        if (mysqli_num_rows($result) == 0) {
            echo "<h3 style='text-align: center; color: red;'>Data Kosong</h3>";
        }
        while ($data = mysqli_fetch_assoc($result)) {
            echo "
            <div class='card'>
                <div class='card-image'>
                    <img src='foto/$data[Gambar]' alt='tidak ada gambar' />
                </div>
                <div class='card-content'>
                    <h5>$data[Nama]</h5>
                    <p class='Jenis'>$data[Jenis]</p>
                    <p class='Harga'> $data[Harga] </p>
                    <button class='btn_belanja' type='submit' onclick='bukaModal($data[ID_Jenis])'>Beli</button>
                </div>
            </div>";
        }
        ?>
    </div>
</div>
<!--  Modal -->
<div id="myModal" class="modal-container" onclick="tutupModal()">
    <div class="modal-dialog" onclick="event.stopPropagation()">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title " style="color: #A34343;">Jumlah Beli</h1>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" name="jenis_rokok_ID_Jenis" id="Nama_id" value="">
                    <input type="hidden" name="jenis_rokok_Nama" id="Nama_name" value="">
                    <input type="hidden" name="Harga" id="Harga" value="">
                    <div class="form-group">
                        <label class="labelmodal" for="recipient-jumlah" class="col-form-label">Jumlah :</label>
                        <input class="inputdata" type="number" class="form-control" id="recipient-jumlah">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="tutupModal()">Keluar</button>
                <button type="button" class="btn btn-yellow" onclick="bukaModal2()">Lanjutkan</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal 2 -->
<div id="myModal2" class="modal-container" onclick="tutupModal2()">
    <div class="modal-dialog" onclick="event.stopPropagation()">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" style="color:  #A34343;">Data Transaksi</h1>
                <button type="button" class="btn-close" aria-label="Close" onclick="tutupModal2()"></button>
            </div>
            <form action="prosestransaksi.php" method="post">
                <div class="modal-body">
                    <h4> Nama Rokok</h4>
                    <div class="form-group">
                        <label class="labelmodal" for="detail-namarokok" class="col-form-label">rokok :</label>
                        <input class="inputdata" type="text" name="detail-namarokok" class="form-control"
                            id="detail-namarokok" readonly>
                    </div>
                    <div class="form-group">
                        <label class="labelmodal" for="detail-harga" class="col-form-label">Harga :</label>
                        <input class="inputdata" type="text" name="detail-harga" class="form-control"
                            id="detail-harga" readonly>
                    </div>
                    <h4>Jumlah Beli</h4>
                    <div class="form-group">
                        <label class="labelmodal" for="detail-jumlah" class="col-form-label">Jumlah :</label>
                        <input class="inputdata" name="detail-jumlah" type="text" class="form-control"
                            id="detail-jumlah" readonly>
                    </div>
                    <input type="hidden" name="detail-Status" value="Pending">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="kembaliKeModalPertama()">Kembali</button>
                    <button name="simpan" type="submit" class="btn btn-yellow">Lakukan Pembayaran</button>
                </div>
            </form>
        </div>
    </div>
</div>
</main>
</div>
<script>
var selectedJenisRokokId;
// Fungsi Modal
function bukaModal(ID_Jenis) {
    console.log('ID_Jenis:', ID_Jenis);
    selectedJenisRokokId = ID_Jenis;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var NamaData = JSON.parse(xhr.responseText);

            // Perbarui input tersembunyi
            document.getElementById('Nama_id').value = ID_Jenis;
            document.getElementById('Nama_name').value = NamaData.Nama;
            document.getElementById('Harga').value = NamaData.Harga;
            document.getElementById("myModal").style.display = "flex";
        }
    };
    xhr.open("GET", "ambilkategori.php?ID_Jenis=" + ID_Jenis, true);
    xhr.send();
}

function tutupModal() {
    document.getElementById("myModal").style.display = "none";
}

function tutupModal2() {
    document.getElementById("myModal2").style.display = "none";
}

function bukaModal2() {
    tutupModal(); // Tutup modal pertama
    document.getElementById("myModal2").style.display = "flex";

    var jumlah = document.getElementById("recipient-jumlah").value;
    // kategori
    var nama = document.getElementById("Nama_name").value;
    var harga = document.getElementById("Harga").value;

    document.getElementById("detail-jumlah").value = jumlah;
    document.getElementById("detail-namarokok").value = nama;
    document.getElementById("detail-harga").value = harga;
}

function kembaliKeModalPertama() {
    tutupModal2();
    bukaModal(selectedJenisRokokId);
}

function lakukanPembayaran() {
    alert("Pembayaran berhasil!");
    tutupModal2();
    document.getElementById("recipient-jumlah").value = ''; // Clear input
}
</script>
</body>
</html>