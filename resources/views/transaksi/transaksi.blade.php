<!DOCTYPE html>
<html>
<head>
    <title>Jenis Rokok</title>
    <link rel="stylesheet" href="{{ asset('css/style3.css') }}" />
</head>
<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href=''>Transaksi</a></div>
            <div class="menu">
                <ul>
                    <li><a href="{{ url('admin') }}">Kembali</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <button type="button"><a href="{{('transaksi/transaksi-cetak') }}">Cetak Transaksi</a></button>
    <table class="table-data">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Jenis Rokok</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($transaksirokok as $transaksi)
        <tr>
            <td>{{ $transaksi->updated_at }}</td>
            <td>{{ $transaksi->jumlah }}</td>
            <td>{{ $transaksi->jenisrokok->nama ?? 'Data tidak ditemukan' }}</td>
            <td>{{ $transaksi->status }}</td>
            <td>
                <button class='btn_detail' 
                    onclick='showDetails("{{ $transaksi->updated_at }}", "{{ $transaksi->jumlah }}", "{{ $transaksi->jenirokok->nama ?? 'Data tidak ditemukan' }}", "{{ $transaksi->status }}")'>Detail</button>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" align="center">Tidak ada data</td>
        </tr>
        @endforelse
        </tbody>
    </table>
    <script>
        function showDetails(tanggal, nama, jumlah, status) {
         let nama = event.target.getAttribute('recipient-jumlah');
         alert(`Tanggal: ${tanggal}\nNama: ${nama}\nJumlah: ${jumlah}\nStatus: ${status}`);
      }
    </script>
</body>
</html>
