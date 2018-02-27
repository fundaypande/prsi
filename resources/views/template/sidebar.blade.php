<div class="sidebar" data-color="purple">

<!--
data-image="{{ asset('img/sidebar-5.jpg') }}

    Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
    Tip 2: you can also add an image using data-image tag

-->

  <div class="sidebar-wrapper">
        <div class="logo">
            <a href="/" class="simple-text">
                PRSI BULELENG
            </a>
        </div>

        <ul class="nav">
          <li>
              <a href="/home">
                  <i class="pe-7s-graph"></i>
                  <p>Dashboard</p>
              </a>
          </li>
            <li>
                <a href="/atlit">
                    <i class="pe-7s-users"></i>
                    <p>Data Atlit</p>
                </a>
            </li>
            <li>
                <a href="/daftar">
                    <i class="pe-7s-news-paper"></i>
                    <p>Mendaftar Lomba</p>
                </a>
            </li>
            <li>
                <a href="/ku">
                    <i class="pe-7s-id"></i>
                    <p>Kelompok Umur</p>
                </a>
            </li>
            <li>
                <a href="/lomba">
                    <i class="pe-7s-mail-open-file"></i>
                    <p>Daftar Lomba</p>
                </a>
            </li>
            <li>
                <a href="/sekolah">
                    <i class="pe-7s-culture"></i>
                    <p>Daftar Sekolah</p>
                </a>
            </li>
            <li>
                <a href="/admin/user">
                    <i class="pe-7s-add-user"></i>
                    <p>Daftar Pengguna</p>
                </a>
            </li>
            <li>
                <a href="/laporan">
                    <i class="pe-7s-graph2"></i>
                    <p>Laporan</p>
                </a>
            </li>

        </ul>
  </div>
</div>
<script type="text/javascript">
  var currentURL = $(location).attr("href"); //get all url
  var base_url = window.location.origin; //get base url ('http://localhost.com')

  currentURL = currentURL.replace(base_url, '');
  $("li").find('a[href="'+ currentURL +'"]').parent().addClass('active');

</script>
