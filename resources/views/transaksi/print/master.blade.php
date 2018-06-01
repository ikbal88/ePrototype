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

    td{
      font-size:60%;
    }

    th{
      font-size:70%;
    }

    table.x, th.x, td.x {
      border: 1px solid black;
      border-collapse: collapse;
    }

    </style>
  </head>
  <body>
    <img src="{{ public_path() . '/image/header.png' }}" alt="ePrototype">
    <h6 class="center">{{ $title }}</h6>

<table id="table_head" width="100%">
  <tr>
    <td class="a" width="20%";>SUPPLIER</td>
    <td class="b" width="50%">: {{ $data[0]->nama_supplier }}</td>
    <td class="c" width="20%">ISSUE DATE</td>
    <td class="d" width="10%">: {{ Carbon\Carbon::parse($data[0]->tanggal)->format('d M Y') }}</td>
  </tr>
  <tr>
    <td class="a">ADDRESS</td>
    <td class="b">: {{ $data[0]->alamat_supplier }}</td>
    <td class="c">COSTUMER PO</td>
    <td class="d">: {{ $data[0]->id }}</td>
  </tr>
  <tr>
    <td class="a">ATTN</td>
    <td class="b">: {{ $data[0]->attention }}</td>
    <td class="c">STYLE</td>
    <td class="d">: {{ $data[0]->style }} </td>
  </tr>
  <tr>
    <td class="a">TERM OF PAYMENT</td>
    <td class="b">: {{ $data[0]->top }}</td>
    <td class="c"></td>
    <td class="d">: </td>
  </tr>
  <tr>
    <td class="a">SHIPMENT TERM</td>
    <td class="b">: {{ $data[0]->tos }}</td>
    <td class="c"></td>
    <td class="d">: </td>
  </tr>
  <tr>
    <td class="a">DELIVERY DATE</td>
    <td class="b">: {{ Carbon\Carbon::parse($data[0]->tanggal_kirim)->format('d M Y') }}</td>
    <td class="c"></td>
    <td class="d">: </td>
  </tr>
</table>
<br>
    <table id="table_detail" class="x table table-striped table-bordered table-hover" width="100%">
      <thead>
        <tr>
          @if(isset($d->nama_material))
          <th class="x">NAMA BARANG</th>
          <th class="x">COLOUR</th>
          @else
          <th class="x">NAMA BARANG</th>
          @endif
          <th class="x">SIZE</th>
          <th class="x">L/D</th>
          <th class="x">QTY</th>
          <th class="x">UNIT</th>
          <th class="x">PRICE</th>
          <th class="x">TOTAL</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $d)
          <tr>
            @if(isset($d->nama_material))
            <td class="x">{{ $d->nama_material }}</td>
            <td class="x">{{ $d->nama_warna }}</td>
            @else
            <td class="x">{{ $d->nama_barang }}</td>
            @endif
            <td class="x">{{ $d->size }}</td>
            <td class="x">{{ $d->ld }}</td>
            <td class="x">{{ $d->qty }}</td>
            <td class="x">{{ $d->nama_satuan }}</td>
            <td class="x">Rp. {{ number_format($d->price,2) }}</td>
            <td class="x">Rp. {{ number_format($d->total,2) }}</td>
          </tr>
        @endforeach
          <tr>
            @if(isset($d->nama_material))
            <td colspan="7">INCLUDE PPN</td>
            @else
            <td colspan="6">INCLUDE PPN</td>
            @endif
            <td><strong>Rp. {{ number_format($total_trans,2) }}<strong></td>
          </tr>
      </tbody>
    </table>

    <table width="100%" style="margin-top:70px;">
      <tr>
        <td width="20%">( SUPPLIER )</td>
        <td width="20%">( ORDER BY )</td>
        <td width="20%">( CHECKED BY )</td>
        <td width="20%">( ACCOUNTING )</td>
        <td width="20%">( AUTHORIZED SIGNATURE )</td>
      </tr>
    </table>

    <table width="100%" style="margin-top:20px;">
      <tr><td><strong>TERM AND CONDITIONS</strong></td></tr>
      <tr><td>1. THIS PO SHOULD BE CONFIRMED BACK WITH SALES ORDER CONFIRMING ALL TECHNICAL DETAIL OF ACCEPTANCE WITHIN 2 WORKING DAYS</td></tr>
      <tr><td>2. ALL COLOUR SHOULD MATCH WITH APPROVAL L/D FROM BUYER</td></tr>
      <tr><td>3. TOLERANCE QUANTITY MAXIMUM 3% FROM ORDER QUANTITY</td></tr>
      <tr><td>4. FABRIC WEIGHT AND WIDTH TOLERANCE WEIGHT : PLUS OR MINUS 3% AND WIDTH : PLUS OR MINUS 1 INCH. </td></tr>
      <tr><td>5. IF IT IS YARN DYED FAB MILL MUST FOLLOW BUYER STRIPE REPEAT</td></tr>
      <tr><td>6. SRINKAGE MAXIMUM 5% ON FABRIC</td></tr>
      <tr><td>7. ALL BULK FABRIC SHOULD PASS THE BUYERS STANDARD TEST REPORT</td></tr>
      <tr><td>8. DELIVERY SHOULD BE FORWARDED WITH A PACKING LIST, MENTIONING LOT NO, COLOUR WIDTH,GSM,KGS,YARDAGE & QC REPORT </td></tr>
      <tr><td>9. DELIVERY TIME SHOULD FOLLOW AS PER CONFIRMATIONS PO WHICH ALREADY CONFIRMED, IF THERE'S ANY DELAY WILL EFFECT TO GARMENT DELIVERY SUPPLIER SHOULD TAKE RESPONSIBILITY FOR AIR OR DISCOUNT</td></tr>
      <tr><td>10. AFTER COMPLETION OF PO ORDER QTTY WHILE MAKING CONTRA BON, PO COPY,SURAT JALAN AND FAKTUR PAJAK ORIGINAL SHOULD BE ENCLOSED TOGETHER</td></tr>
      <tr><td>11. ALL SUPPLYS MADE SHOULD BE FREE OF DYE STUFFS PASSING ACOTES AZO FREE AS PER E.U. STANDARS OF BUYER</td></tr>
      <tr><td>12. IF IN THIS CASE SUPPLIED GOODS  ARE FOUND INFERIOR QUALITY AND NOT PASSING ACOTES,AZOFREE STANDARS ALL CLAIMS WILL BE CHARGED BACK TO SUPPLIER</td></tr>
      <tr><td>13.PAYMENT TERM WILL BE CALCULATED FROM THE LAST DELIVERY DATE   </td></tr>
      <tr><td>14. SUPPLIER USING LCL CARGO MUST USE NOMINATED FORWARDER AGENT FROM PT. SUNSHINE INDOPRATAMA </td></tr>
    </table>
  </body>
</html>
