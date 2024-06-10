<!DOCTYPE html>
<html>
<head>
    <title>Jenis Rokok</title>
    <link rel="stylesheet" href="{{ asset('css/style3.css') }}" />
    </head>
<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href=''>Jenis Rokok</a></div>
            <div class="menu">
                <ul>
                    <li><a href="admin.php">Kembali</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <table>
            <thead>
                <tr>
                    <button> <a href="{{ route('jenisrokok.create') }}" >Tambah Data</button>
                    <th scope="col" style="width: 20%">Gambar</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Isi</th>
                    <th>Actions</th>
                </tr>   
            </thead>
            <tbody>
            @forelse ($Jenisrokok as $Jenisrokok)
    <tr>
      <td><img src="{{ ('foto/' . $Jenisrokok->gambar)  }}" alt="" width="300px"></td>
      <td>{{ $Jenisrokok->nama }}</td>
      <td>{{ ($Jenisrokok->jenis) }}</td>
      <td>{{ $Jenisrokok->isi }}</td>
      <td>
      <a class='btn-edit' href="{{ route('jenisrokok.edit', $Jenisrokok->id_jenis) }}">Edit</a>
        |
        <form action="{{ route('jenisrokok.destroy', $Jenisrokok->id_jenis) }}" method="POST" onsubmit="return confirm('Apakah Anda Yakin ?');" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
    </tr>
    @empty
    <tr>
      <td colspan="5" align="center">Tidak ada data</td>
    </tr>
    @endforelse
        </tbody>
    </table>
</body>
</html>