<html>

<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/styles/style.css" media="all"/>
    <link href="<?php echo base_url(); ?>/assets/css/font-awesome.css" rel="stylesheet">
</head>

<body>

<div class ="main_content">
    <div class="slideshow">
        <div class = "slideshow-container">
            <div class="mySlides fade" style="display: block">
                <img src="<?php echo base_url(); ?>/assets/images/s1.jpg" style="width: 100%">
            </div>

            <div class="mySlides fade" style="display: block;">
                <img src="<?php echo base_url(); ?>/assets/images/s2.jpg" style="width:100%">
            </div>

            <div class="mySlides fade" style="display: none;">
                <img src="<?php echo base_url(); ?>/assets/images/s3.jpg" style="width:100%">
            </div>
        </div>


    <div style="text-align:center">
        <span class="dot active"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>
    </div>
    <script>

        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
            setTimeout(showSlides, 3000); // Change image every 2 seconds
        }

    </script>
</div>

</body>