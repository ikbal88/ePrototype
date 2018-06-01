<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Export</title>
  </head>
  <body>
    <?php $image_path = '/temp/img/logo.png'; ?>
    <img src="{{ public_path() . $image_path }}" alt="ePrototype" style="display:block;margin: 0 auto;">
    <p><h1 style="text-align:center;">{{$company}}</h1></p>
    <p><h4 style="text-align:center;">Alamat : {{$alamat}}</h4></p><hr><br>
    <!-- <p><h6>No Telepon : {{$no_telepon}}, Email : {{$email}}</h6></p> -->
    <h5>Export {{ $title }}</h5>
    <table id="master-table" class="table table-striped table-bordered table-hover" width="100%">
      <thead>
        <tr>
          <th>Kode</th>
          <th>Nama</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $d)
          <tr>
            <td>{{ $d->id }}</td>
            <td>{{ $d->name }}</td>
            <td>{{ ($d->isactive == 'A') ? 'Aktif' : 'Non Aktif' }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </body>
</html>
