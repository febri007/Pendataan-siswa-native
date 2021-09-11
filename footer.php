 <script src="assets/js/vendor-all.min.js"></script>
 <script src="assets/js/plugins/bootstrap.min.js"></script>
 <script src="assets/js/highcharts.js"></script>
 <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>
 <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
 <script src="assets/js/pcoded.min.js"></script>
 <script src="assets/js/plugins/prism.js"></script>
 <script src="assets/js/horizontal-menu.js"></script>
 <script src="assets/alert/js/sweetalert.min.js"></script>
 <script src="assets/alert/js/qunit-1.18.0.js"></script>

 <?php if ($page=="home"): ?>
    <?php  
    $data = array();
    ?>
    <?php foreach ($siswa4 as $key => $siswa4): ?>
        <?php  
        $total = 0;
        $id_siswa = $siswa4['id_siswa'];
        $show_nilai4 = $rangking->show_nilai($id_siswa);
        ?>


        <?php foreach ($show_nilai4 as $show_nilai4): ?>
            <?php  
            $id_kriteria = $show_nilai4['id_kriteria'];
            $tipe = $show_nilai4['tipe_kriteria'];
            $bobot = $show_nilai4['bobot_kriteria'];
            ?>

            <?php  
            if ($tipe=="Benefit") 
            {
                $stmtmax = $rangking->readMax($id_kriteria);
                $nor =  round($show_nilai4['nilai_rangking']/$stmtmax['rmax'],2);
                $hasil = $nor*$bobot;
                $total += $hasil;
            }
            else
            {
                $stmtmin = $rangking->readMin($id_kriteria);
                $nor = round($stmtmin['rmin']/$show_nilai4['nilai_rangking'],2);
                $hasil = $nor*$bobot;
                $total += $hasil;
            }
            ?>
        <?php endforeach ?>
        <?php  
        $data[$key] = array('total' => $total, 'nm_siswa' => $siswa4['nm_siswa']); 
        ?>

    <?php endforeach ?>
    <?php  
    arsort($data); 
    ?>
    <script>
    var chart1; // globally available
    $(document).ready(function() {
        chart1 = new Highcharts.Chart({
            chart: {
                renderTo: 'container2',
                type: 'column'
            },  
            title: {
                text: 'Grafik Perangkingan '
            },
            xAxis: {
                categories: ['Alternatif']
            },
            yAxis: {
                title: {
                    text: 'Jumlah Nilai'
                }
            },
            series:            
            [
            <?php
            foreach ($data as $key => $value) {
                ?>
                     //data yang diambil dari database dimasukan ke variable nama dan data
                     //
                     {
                        name: '<?= $value['nm_siswa'] ?>',
                        data: [<?= $value['total'] ?>]
                    },
                <?php } ?>
                ]
            });
    });  
</script>
<?php endif ?>


<script>
    $(document).ready(function() {
        var table = $('#example').DataTable( {
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true
        } );
    } );
    $(document).on('click', '.keluar', function(){
        var getLink = $(this).attr('href');
        swal({
            title: 'Apakah anda yakin?',
            type: 'warning',
            html: true,
            confirmButtonColor: '#d9534f',
            showCancelButton: true,
        },function(){
            window.location.href = getLink
        });
        return false;
    });
    $(document).on('click', '.hapus-siswa', function(){
        var getLink = $(this).attr('href');
        swal({
            title: 'Apakah anda yakin?',
            text:  'siswa tidak bisa dikembalikan lagi setelah dihapus!',
            type: 'warning',
            html: true,
            confirmButtonColor: '#d9534f',
            showCancelButton: true,
        },function(){
            window.location.href = getLink
        });
        return false;
    });
    $(document).on('click', '.hapus-user', function(){
        var getLink = $(this).attr('href');
        swal({
            title: 'Apakah anda yakin?',
            text:  'User tidak bisa dikembalikan lagi setelah dihapus!',
            type: 'warning',
            html: true,
            confirmButtonColor: '#d9534f',
            showCancelButton: true,
        },function(){
            window.location.href = getLink
        });
        return false;
    });
    $(document).on('click', '.hapus-nilai', function(){
        var getLink = $(this).attr('href');
        swal({
            title: 'Apakah anda yakin?',
            text:  'Nilai tidak bisa dikembalikan lagi setelah dihapus!',
            type: 'warning',
            html: true,
            confirmButtonColor: '#d9534f',
            showCancelButton: true,
        },function(){
            window.location.href = getLink
        });
        return false;
    });
    $(document).on('click', '.hapus-kriteria', function(){
        var getLink = $(this).attr('href');
        swal({
            title: 'Apakah anda yakin?',
            text:  'Kriteria tidak bisa dikembalikan lagi setelah dihapus!',
            type: 'warning',
            html: true,
            confirmButtonColor: '#d9534f',
            showCancelButton: true,
        },function(){
            window.location.href = getLink
        });
        return false;
    });
    (function() {
        if ($('#layout-sidenav').hasClass('sidenav-horizontal') || window.layoutHelpers.isSmallScreen()) {
            return;
        }
        try {
            window.layoutHelpers._getSetting("Rtl")
            window.layoutHelpers.setCollapsed(
                localStorage.getItem('layoutCollapsed') === 'true',
                false
                );
        } catch (e) {}
    })();
    $(function() {
        $('#layout-sidenav').each(function() {
            new SideNav(this, {
                orientation: $(this).hasClass('sidenav-horizontal') ? 'horizontal' : 'vertical'
            });
        });
        $('body').on('click', '.layout-sidenav-toggle', function(e) {
            e.preventDefault();
            window.layoutHelpers.toggleCollapsed();
            if (!window.layoutHelpers.isSmallScreen()) {
                try {
                    localStorage.setItem('layoutCollapsed', String(window.layoutHelpers.isCollapsed()));
                } catch (e) {}
            }
        });
    });
    $(document).ready(function() {
        $("#pcoded").pcodedmenu({
            themelayout: 'horizontal',
            MenuTrigger: 'hover',
            SubMenuTrigger: 'hover',
        });
    });
</script>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
<script src="assets/js/analytics.js"></script>
<script type="text/javascript">
    $(".alert-slide-up").alert().delay(3000).slideUp('slow');
</script>
</body>
</html>
