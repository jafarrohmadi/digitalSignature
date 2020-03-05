<!--add js-->
<script type="text/javascript" src="{{ asset('js/foot.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-min.js') }}"></script>
<script type="text/javascript" language="javascript" src="{{ asset('js/datatable.js') }}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.min.js" charset="utf-8"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script> --}}
{{-- <script type="text/javascript" src="{{ asset('js/intro.js') }}"></script> --}}
{{-- <script type="text/javascript">

    $(document).ready(function(){

        $(".new-berita-slick-image").css({'height':($(".ayoomall-image").height()+'px')});
        $(".ayooworld-image").css({'height':($(".ayoomall-image").height()+'px')});

        // intro
        //startIntro();

        //slick
        $('.new-slick').slick({
            autoplay: true,
            autoplaySpeed: 3000,
            centerPadding: '0',
            centerMode: true,
            dots: true,
            arrows: false,
            infinite: false
        });

        $('.new-jadwal-slick').slick({
            dots: true,
            arrows: false,
            speed: 300,
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1017,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });

    // karyawandetail
    var modalkaryawandetail = $('.modalkaryawandetail');
    var modalkaryawandetailopen = $('.modalkaryawandetailopen');
    var modalkaryawandetailback = $('.modalkaryawandetailback');
    var modalkaryawandetailclose = $('.modalkaryawandetailclose');

    $(modalkaryawandetailopen).on('click',function(){
        $('.modalkaryawandetail').css('display','block');
        $('body','html').css('overflow', 'hidden');
    });

    $(modalkaryawandetailback).on('click',function(){
        $('.modalkaryawandetail').css('display','none');
        $('body','html').css('overflow', 'auto');
    });

    $(modalkaryawandetailclose).on('click',function(){
        $('.modalkaryawandetail').css('display','none');
        $('body','html').css('overflow', 'auto');
    });

    // partnerdetail
    var modalpartnerdetail = $('.modalpartnerdetail');
    var modalpartnerdetailopen = $('.modalpartnerdetailopen');
    var modalpartnerdetailback = $('.modalpartnerdetailback');
    var modalpartnerdetailclose = $('.modalpartnerdetailclose');

    $(modalpartnerdetailopen).on('click',function(){
        $('.modalpartnerdetail').css('display','block');
        $('body','html').css('overflow', 'hidden');
    });

    $(modalpartnerdetailback).on('click',function(){
        $('.modalpartnerdetail').css('display','none');
        $('body','html').css('overflow', 'auto');
    });

    $(modalpartnerdetailclose).on('click',function(){
        $('.modalpartnerdetail').css('display','none');
        $('body','html').css('overflow', 'auto');
    });

    $(window).on('resize', function(){
        $(".new-berita-slick-image").css({'height':($(".ayoomall-image").height()+'px')});
        $(".ayooworld-image").css({'height':($(".ayoomall-image").height()+'px')});
    });

    function startIntro(){
        var intro = introJs();
          intro.setOptions({
            showBullets:false,
            steps: [
              {
                element: '.tour1',
                intro: "Pengaturan informasi anda.",
                position: 'right'
              },
              {
                element: '.tour2',
                intro: "Statistik tugas anda",
                position: 'right'
              },
              {
                element: '.tour3',
                intro: "Informasi kehadiran anda",
                position: 'right'
              },
              {
                element: '.tour4',
                intro: "Beberapa iklan terkait PT. Airmas Perkasa",
                position: 'right'
              },
              {
                element: '.tour5',
                intro: "Informasi dari HR terkait PT. Airmas Perkasa",
                position: 'right'
              },
              {
                element: '.tour6',
                intro: "Statistik penghargaan sales terbaik, jadwal training dan informasi partner",
                position: 'right'
              },
            ]
          });
          intro.start();
      }

    Chart.defaults.global.legend.labels.usePointStyle = true;

    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'doughnut',

        // The data for our dataset
        data: {
            labels: ['Laki-Laki', 'Perempuan', 'Unset'],
            datasets: [{
                label: 'chart',
                backgroundColor: ['#00cec9', '#00b894', '#6c5ce7'],
                borderColor: '#fff',
                borderWidth: 0,
                data: [200, 150, 50]
            }]
        },

        // Configuration options go here
        options: {
            legend: {
                display: true,
                labels: {
                    fontColor: '#212526',
                    boxWidth: 7,
                    fontSize: 14,
                },
                position: 'bottom',
            },
            plugins: {
                labels: {
                render: 'value',
                fontSize: 14,
                fontColor: '#fff',
                }
            },
            cutoutPercentage: 60,
            responsive: true,
            maintainAspectRatio: false
        }
    });

    //zoom image
    var modal = document.getElementById('image-zoom');
    var img = document.getElementById('zoom-image');
    var modalImg = document.getElementById("image-zoom01");


    img.onclick = function(){
         modal.style.display = "block";
         modalImg.src = this.src;
    }
    var span = document.getElementsByClassName("zoom-close1")[0];
    span.onclick = function() {
        modal.style.display = "none";
    }

</script> --}}
