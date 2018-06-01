<!-- Left panel : Navigation area -->
<!-- Note: This width of the aside area can be adjusted through LESS variables -->
<aside id="left-panel">

  <!-- User info -->
  <div class="login-info">
    <span> <!-- User image size is adjusted inside CSS, it should stay as it -->

      <a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
        <img src="{{ asset('temp/img/avatars/sunny.png') }}" alt="me" class="online" />
        <span>
          {{ Auth::user()->name }}
        </span>
        <i class="fa fa-angle-down"></i>
      </a>

    </span>
  </div>
  <!-- end user info -->

  <nav>
    <!--
    NOTE: Notice the gaps after each icon usage <i></i>..
    Please note that these links work a bit different than
    traditional href="" links. See documentation for details.
    -->

    <ul>
      <li class="active open">
        <a href="{{ url('/dashboard') }}" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
      </li>
      <li>
        <!-- Jika ada Notif Di Menu -->
        <!-- <a href="#"><i class="fa fa-lg fa-fw fa-database"></i> <span class="menu-item-parent">Outlook</span> <span class="badge pull-right inbox-badge margin-right-13">14</span></a> -->
        <!-- Jika ada Notif Di Menu -->
        <a href="#"><i class="fa fa-lg fa-fw fa-database"></i> <span class="menu-item-parent">Master</span></a>
        <ul>
          <li>
            <a href="{{ url('/material') }}">Material</a>
          </li>
          <li>
            <a href="{{ url('/warna') }}">Warna</a>
          </li>
          <li>
            <a href="{{ url('/satuan') }}">Satuan</a>
          </li>
          <li>
            <a href="{{ url('/proses') }}">Proses</a>
          </li>
          <li>
            <a href="{{ url('/jenis_barang') }}">Jenis Barang</a>
          </li>
          <li>
            <a href="{{ url('/barang') }}">Barang</a>
          </li>
          <li>
            <a href="{{ url('/supplier') }}">Supplier</a>
          </li>
          <li>
            <a href="{{ url('/costumer') }}">Costumer</a>
          </li>
          <li>
            <a href="{{ url('/role') }}">Role</a>
          </li>
        </ul>
      </li>
      <li>
        <a href="#"><i class="fa fa-lg fa-fw fa-truck"></i> <span class="menu-item-parent">Transaksi</span></a>
        <ul>
          <li>
            <a href="{{ url('/pembelian') }}">PO Pembelian</a>
          </li>
          <li>
            <a href="{{ url('/maklon') }}">PO Maklon</a>
          </li>
          <li>
            <a href="{{ url('/surat_jalan') }}">Surat Jalan</a>
          </li>
          <li>
            <a href="{{ url('/surat_masuk') }}">Surat Masuk</a>
          </li>
          <li>
            <a href="{{ url('/trans') }}">Penjualan</a>
          </li>
          <li>
            <a href="{{ url('/invoice') }}">Produksi</a>
          </li>

        </ul>
      </li>
      <li>
        <a href="#"><i class="fa fa-lg fa-fw  fa-clipboard"></i> <span class="menu-item-parent">Report</span></a>
        <ul>
          <li>
            <a href="#">Master</a>
            <ul>
              <li>
                <a href="{{ url('/export_material') }}">Material</a>
              </li>
              <li>
                <a href="{{ url('/export_warna') }}">Warna</a>
              </li>
              <li>
                <a href="{{ url('/export_satuan') }}">Satuan</a>
              </li>
              <li>
                <a href="{{ url('/export_proses') }}">Proses</a>
              </li>
              <li>
                <a href="{{ url('/export_jenis_barang') }}">Jenis Barang</a>
              </li>
              <li>
                <a href="{{ url('/export_barang') }}">Barang</a>
              </li>
              <li>
                <a href="{{ url('/export_supplier') }}">Supplier</a>
              </li>
              <li>
                <a href="{{ url('/export_costumer') }}">Costumer</a>
              </li>
              <li>
                <a href="{{ url('/export_role') }}">Role</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="{{ url('/work_in_process') }}">Work In Process</a>
          </li>
          <li>
            <a href="#">Stock</a>
            <ul>
              <li><a href="{{ url('/stock_a') }}">Stock Grade A</a></li>
              <li><a href="{{ url('/stock_b') }}">Stock Grade B</a></li>
            </ul>
          </li>
          <li>
            <a href="{{ url('/rekap_trans') }}">Rekap Penjualan</a>
          </li>
        </ul>
      </li>
      <li>
        <a href="#"><i class="fa fa-lg fa-fw fa-check-square"></i> <span class="menu-item-parent">Verifikasi</span></a>
        <!-- <a href="#"><i class="fa fa-lg fa-fw fa-check-square"><em>7</em></i> <span class="menu-item-parent">Verifikasi</span></a> -->
        <ul>
          <li>
            <a href="{{ url('/verify_pembelian') }}">Pembelian Barang PO </a>
            <!-- <a href="{{ url('/verify_pembelian') }}">Pembelian Barang PO <span class="badge bg-color-greenLight pull-right inbox-badge">2</span></a> -->
          </li>
          <li>
            <a href="{{ url('/verify_makloon') }}">Maklon PO </a>
          </li>
          <li>
            <a href="{{ url('/verify_surat_masuk') }}">Surat Jalan </a>
          </li>
          <li>
            <a href="{{ url('/verify_surat_masuk') }}">Surat Masuk </a>
          </li>
        </ul>
      </li>
      <li>
        <a href="#"><i class="fa fa-lg fa-fw fa-gear"></i> <span class="menu-item-parent">Setting</span></a>
        <ul>
          <li>
            <a href="{{ url('/user') }}">User</a>
          </li>
          <li>
            <a href="{{ url('/profil') }}">Profil Perusahaan</a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>


  <span class="minifyme" data-action="minifyMenu">
    <i class="fa fa-arrow-circle-left hit"></i>
  </span>

</aside>
<!-- END NAVIGATION -->
