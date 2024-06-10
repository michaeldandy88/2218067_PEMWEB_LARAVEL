<!DOCTYPE html>
<html>
<head>
    <title>Edit Jenis Rokok</title>
    <link rel="stylesheet" href="{{ asset('css/style3.css') }}" />
</head>
<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href="{{ route('jenisrokok.index') }}">Edit Data</a></div>
            <div class="menu">
                <ul>
                    <li><a href="{{ url('admin.php') }}">Kembali</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <form action="{{ route('jenisrokok.update', $Jenisrokok->id_jenis) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put') <!-- Diperlukan untuk mengakses route jenisrokok.update -->
        <label for="Gambar">Gambar:</label>
        <img src="{{ asset('foto/' . $Jenisrokok->gambar) }}" alt="" width="200px">
        <input type="file" name="gambar" />
        @error('gambar')
        <p style="font-size: 10px; color: red">{{ $message }}</p>
        @enderror
        <label for="Nama">Nama:</label>
        <input class="input" type="text" name="nama" placeholder="Masukan Nama Rokok"
        value="{{ old('nama', $Jenisrokok->nama) }}" />
        @error('nama')
        <p style="font-size: 10px; color: red">{{ $message }}</p>
        @enderror
        <br>
        <label for="Jenis">Jenis:</label>
        <input class="input" type="text" name="jenis" placeholder="Masukan Jenis Rokok"
        value="{{ old('jenis', $Jenisrokok->jenis) }}" />
        @error('jenis')
        <p style="font-size: 10px; color: red">{{ $message }}</p>
        @enderror
        <br>
        <label for="isi">Isi:</label>
        <input class="input" type="text" name="isi" placeholder="Masukan isi Rokok"
        value="{{ old('isi', $Jenisrokok->isi) }}" />
        @error('isi')
        <p style="font-size: 10px; color: red">{{ $message }}</p>
        @enderror
        <br>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>
