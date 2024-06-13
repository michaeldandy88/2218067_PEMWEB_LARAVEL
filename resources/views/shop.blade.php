<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PenjualanRokok</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('styleshop/styleshop.css') }}" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href=''>WarungRokok.</a></div>
            <div class="menu">
                <ul>
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/shop') }}">Shop</a></li>
                    <li><a href="{{ url('/register') }}" class="button1">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="cards-categories">
        <h2>Pilih Rokok</h2>
        <div class="card-categories">
            @if (!isset($jenirokoks) || count($jenirokoks) == 0)
                <h3 style="text-align: center; color: red;">Data Kosong</h3>
            @else
                @foreach ($jenirokoks as $data)
                    <div class="card">
                        <div class="card-image">
                            <img src="{{ asset('foto/' . $data->gambar) }}" alt="tidak ada gambar" />
                        </div>
                        <div class="card-content">
                            <h5>{{ $data->nama }}</h5>
                            <p class="jumlah">{{ $data->jumlah }}</p>
                            <button class="btn_belanja" type="button" onclick='bukaModal({{ $data->id_jenis }})'>Beli</button>
                        </div>
                    </div>

                    <!-- Modal 1 -->
                    <div id="myModal{{ $data->id_jenis }}" class="modal-container" onclick="tutupModal({{ $data->id_jenis }})">
                        <div class="modal-dialog" onclick="event.stopPropagation()">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title" style="color: #ffb72b;">Formulir Pembayaran</h1>
                                    <button type="button" class="btn-close" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <input type="hidden" name="jenisrokok_id" id="jenisrokok_id" value="{{ $data->id_jenis }}">
                                        <div class="form-group">
                                            <label class="labelmodal" for="recipient-jumlah">Jumlah :</label>
                                            <input class="inputdata" type="number" name="recipient-jumlah" class="form-control" id="recipient-jumlah">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" onclick="tutupModal({{ $data->id_jenis }})">Keluar</button>
                                    <button type="button" class="btn btn-yellow" onclick="bukaModal2({{ $data->id_jenis }})">Lanjutkan</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal 2 -->
                    <div id="myModal2{{ $data->id_jenis }}" class="modal-container" onclick="tutupModal2({{ $data->id_jenis }})">
                        <div class="modal-dialog" onclick="event.stopPropagation()">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title" style="color: #ffb72b;">Data Transaksi</h1>
                                    <button type="button" class="btn-close" aria-label="Close" onclick="tutupModal2({{ $data->id_jenis }})"></button>
                                </div>
                                <form action="{{ route('transaksirokok') }}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <h4>Kategori</h4>
                                        <div class="form-group">
                                            <input type="hidden" name="id_jenis" value="{{ $data->id_jenis }}">
                                            <label class="labelmodal" for="detail-kategori">Kategori :</label>
                                            <input class="inputdata" type="text" name="detail-kategori" class="form-control" id="detail-kategori" value="{{ $data->nama }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="labelmodal" for="detail-jenis">Jenis Rokok :</label>
                                            <input class="inputdata" type="text" name="detail-jenis" class="form-control" id="detail-jenis" value="{{ $data->jenis }}" readonly>
                                        </div>
                                        <h4>Jumlah Beli</h4>
                                        <div class="form-group">
                                            <label class="labelmodal" for="recipient-jumlah">Jumlah Beli :</label>
                                            <input class="inputdata" name="recipient-jumlah" type="text" class="form-control" id="recipient-jumlah" readonly>
                                            @error('recipient-jumlah')
                                                <p style="font-size: 10px; color: red">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <input type="hidden" name="status" value="success">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" onclick="kembaliKeModalPertama({{ $data->id_jenis }})">Kembali</button>
                                        <button name="simpan" type="submit" class="btn btn-yellow">Lakukan Pembayaran</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <script>
    function bukaModal(jenisrokokId) {
        var modal = document.getElementById('myModal' + jenisrokokId);
        modal.style.display = 'flex';
    }

    function tutupModal(jenisrokokId) {
        var modal = document.getElementById('myModal' + jenisrokokId);
        modal.style.display = 'none';
    }

    function bukaModal2(jenisrokokId) {
        tutupModal(jenisrokokId); // Tutup modal pertama
        var modal2 = document.getElementById('myModal2' + jenisrokokId);
        modal2.style.display = 'flex';

        // Ambil nilai dari input fields pada modal pertama
        var modal1 = document.getElementById('myModal' + jenisrokokId);
        var jumlah = modal1.querySelector("#recipient-jumlah").value;

        // Set nilai pada modal kedua
        modal2.querySelector("#recipient-jumlah").value = jumlah;
    }

    function tutupModal2(jenisrokokId) {
        var modal2 = document.getElementById('myModal2' + jenisrokokId);
        modal2.style.display = 'none';
    }

    function kembaliKeModalPertama(jenisrokokId) {
        tutupModal2(jenisrokokId);
        bukaModal(jenisrokokId);
    }

    window.onclick = function(event) {
        if (event.target.classList.contains('modal-container')) {
            event.target.style.display = 'none';
        }
    };
    </script>
</body>
</html>
