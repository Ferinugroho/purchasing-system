(function($) {

    // Tangkap semua objek yang dibutuhkan
    var $slider = $('#slider'),
        $container = $slider.find('.container'),
        $nav = $('#slider-nav'),
        $slide = $container.children(),
        s_length = $slide.length,
        s_wide = $slider.width() * s_length,
        s_height = $slider.height(),
        autoSlide = null;

    // Set posisi '.container' sebagai 'relative' (untuk kebutuhan animasi properti 'left')
    // Set lebar '.container' dengan ukuran = (lebar slideshow * jumlah slide)
    // Set tinggi '.container' dengan ukuran = tinggi slideshow
    $container.css({
        'position':'relative',
        'width':s_wide,
        'height':s_height
    });

    // Otomatis menyisipkan item navigasi berdasarkan jumlah slide
    $slide.each(function(index) {
        var i = index + 1;
        $nav.append('<a href="#slide-'+i+'">'+i+'</a>');
        $(this).attr('id', 'slide-'+i);
    });

    // Klik untuk mengganti slide
    $nav.find('a').on("click", function(pos) {
        // Tambah/lepas kelas 'active' dari item navigasi (untuk pewarnaan item navigasi yang aktif)
        $nav.find('.active').removeClass('active');
        $(this).addClass('active');
         pos = $(this).index() * $slider.width(); // Jarak animasi dihitung  berdasarkan indeks navigasi yang diklik * lebar slider
        $container.animate({left:'-'+pos+'px'}, 600);
        clearInterval(autoSlide); // Bersihkan interval slideshow otomatis...
        autoSlide = setInterval(slideShow, 3000); // Kemudian set kembali interval seperti semula.
        return false;
    }).first().addClass('active');

    // Untuk keperluan event klik otomatis pada navigasi
    function slideShow() {
        if ($nav.find('.active').next().length) {
            $nav.find('.active').next().trigger("click");
        } else {
            $nav.find('a').first().trigger("click");
        }
    } autoSlide = setInterval(slideShow, 3000); // Jalankan fungsi slideShow() dengan interval 3 detik!

})(jQuery); 