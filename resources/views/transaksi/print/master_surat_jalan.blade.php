<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Cetak {{$title}}</title>
  <style>
    img {
      margin-top: -40px;
      margin-left: 45px;
    }
    .center {
      text-align: center;
    }

    p,td{
      font-size:60%;
    }

    th{
      font-size:65%;
    }

    table.x, th.x, td.x {
      border: 1px solid black;
      border-collapse: collapse;
    }

  </style>
</head>
<body>

  <table width="100%">
    <tr>
      <td width="80%"> {{ $profile[0]->name_perusahaan }} <br>Factory : <br>{{ $profile[0]->alamat }}</td>
      <td width="20%"> Nomor : {{ $id }}</td>
    </tr>
  </table>
  <h6 class="center">{{ $title }}<br>PENGELUARAN BARANG</h6>

  <table id="table_head" width="100%">
    <tr>
      <td class="a" width="20%";>Dikirim</td>
      <td class="b" width="50%"></td>
      <td class="c" width="10%">Kepada</td>
      <td class="d" width="20%">: {{ $data[0]->nama_supplier }}</td>
    </tr>
    <tr>
      <td class="a" width="20%";>Oleh {{ $data[0]->pengirim }}</td>
      <td class="b"></td>
      <td class="c">Alamat</td>
      <td class="d">: {{ $data[0]->alamat_supplier }}</td>
    </tr>
    <tr>
      <td class="a" width="20%";>Jam {{ $data[0]->jam }}</td>
      <td class="b"></td>
      <td class="c">Attention</td>
      <td class="d">: {{ $data[0]->attention }}</td>
    </tr>
    <tr>
      <td class="a" width="20%";>Kendaraan No. {{ $data[0]->no_kendaraan }}</td>
      <td class="b"></td>
      <td class="c"></td>
      <td class="d"></td>
    </tr>
  </table>
  <br>
  <table id="table_detail" class="x table table-striped table-bordered table-hover" width="100%">
    <thead>
      <tr>
        <th class="x">BANYAKNYA</th>
        <th class="x">ID - NAMA BARANG</th>
        <th class="x">PO</th>
        <th class="x">KETERANGAN</th>

      </tr>
    </thead>
    <tbody>
      @foreach($data as $d)
      <tr>
        <td class="x">{{ $d->qty }} {{ $d->nama_satuan }}</td>
        <td class="x">{{ $d->id_barang }} - {{ $d->nama_barang }}</td>
        <td class="x">{{ $d->id_po }}</td>
        <td class="x">{{ $d->keterangan }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <table width="100%" >
    <tr>
      <td width="75%">
    <p>PERHATIAN <br>1x24 jam tidak ada claim/pemberitahuan, kami anggap kiriman kami sudah benar dan dapat diterima <br>
      harap diteliti kebenaranya terlebih dahulu sebelum tanda tangan dilakukan.</p></td>
      <td width="25%"> Bandung, {{ $tanggal }}</td>
    </tr>
  </table>

  <table width="100%" style="margin-top:70px;">
    <tr>
      <td width="25%"> Yang Menerima,</td>
      <td width="25%"> Mengetahui,</td>
      <td width="25%"> Accounting,</td>
      <td width="25%"> Yang Mengeluarkan,</td>
    </tr>
  </table>
</body>
</html>
