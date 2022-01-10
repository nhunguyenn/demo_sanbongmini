<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Slideshow</title>
</head>
<body>
    <div class="slideshow">
        <div class="mySlides fade">
            <img src="assets/images/53722972_2963945533679204_5417600107119902720_n.jpg" alt="">
        </div>

        <div class="mySlides fade">
            <img src="assets/images/58372584_3048701601870263_7777750177472839680_n.jpg" alt="">
        </div>

        <div class="mySlides fade">
            <img src="assets/images/65447521_3212361475504274_4869096203184242688_n.jpg" alt="">
        </div>

          <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <!-- <br /> -->
    <!-- The dots/circles -->
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>

    
    <script type="text/javascript">
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
    } 
    </script>

    
</body>
</html>