<!DOCTYPE html>
<html>
<head>
    <title>Tambah Jenis Rokok</title>
    <link rel="stylesheet" href="{{ asset('css/style3.css') }}" />
</head>
<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href=''>Tambah Data</a></div>
            <div class="menu">
                <ul>
                    <li><a href="{{ url('admin.php') }}">Kembali</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <form action="{{ route('jenisrokok.store') }}" method="post" enctype="multipart/form-data">
    @csrf
        <label for="Gambar">Gambar:</label>
        <input type="file" name="gambar" />
        @error('gambar')
        <p style="font-size: 10px; color: red">{{ $message }}</p>
        @enderror
        <label for="Nama">Nama:</label>
        <input class="input" type="text" name="nama" placeholder="Masukan Nama Rokok" value="{{ old('nama') }}" />
        @error('nama')
        <p style="font-size: 10px; color: red">{{ $message }}</p>
        @enderror
        <br>
        <label for="Jenis">Jenis:</label>
        <input class="input" type="text" name="jenis" placeholder="Masukan Nama Rokok" value="{{ old('jenis') }}" />
        @error('jenis')
        <p style="font-size: 10px; color: red">{{ $message }}</p>
        @enderror
        <br>
        <label for="isi">Isi:</label>
        <input class="input" type="text" name="isi" placeholder="Masukan Isi" value="{{ old('isi') }}" />
        @error('isi')
        <p style="font-size: 10px; color: red">{{ $message }}</p>
        @enderror
        <br>
        <button type="submit" name="simpan">Tambah</button>
    </form>
</body>
</html>
