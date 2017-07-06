<?php 
if (isset($_GET['id'])) {
    session_start();
    $_SESSION['current_user'] = $_GET['id'];
}
require_once './includes/header.php';
?>

<!-- Row 2: Jumbotron -->
<div class="row">
    <div class="jumbotron col-sm-12 col-xs-12">
            <h2>Help a Human in Need...</h2>
            <a class="btn btn-primary btn-lg" href="donate.php" alt="Donate">Donate Today</a>
    </div>
</div><!-- end row 2 -->

<!-- Row 3: Testimonals-->
<section class="testimonials">
    <h1 class="well">What people are saying about The Human Fund...</h1>
    <div class="row">
        <div class="testimonial col-sm-2 col-xs-6">
            <div class="thumbnail">
                <img src="img/hs_female_1.jpg" alt="">
                <div class="caption">
                    <h3>Stacy</h3>
                    <h4>Akron, OH</h4>
                    <p>"Thanks for the tax break Human Fund!"</p>
                </div> <!-- end .caption -->
            </div> <!-- end .thumbnail -->
        </div> <!-- end .testimonial -->

        <div class="testimonial col-sm-2 col-xs-6">
            <div class="thumbnail">
                <img src="img/costanza.jpg" alt="">
                <div class="caption">
                    <h3>George</h3>
                    <h4>Queens, NY</h4>
                    <p>"This is definitely <b>not</b> a fake charity."</p>
                </div> <!-- end .caption -->
            </div> <!-- end .thumbnail -->
        </div> <!-- end .testimonial -->

        <div class="testimonial col-sm-2 col-xs-6">
            <div class="thumbnail">
                <img src="img/hs_male_1.jpg" alt="">
                <div class="caption">
                    <h3>Mark</h3>
                    <h4>Anchorage, AK</h4>
                    <p>"I'm not sure what you actually do but keep up the good work!"</p>
                </div> <!-- end .caption -->
            </div> <!-- end .thumbnail -->
        </div> <!-- end .testimonial -->

        <div class="testimonial col-sm-2 col-xs-6">
            <div class="thumbnail">
                <img src="img/hs_cthulhu.jpg" alt="">
                <div class="caption">
                    <h3>Cthulhu</h3>
                    <h4>Venice Beach, CA</h4>
                    <p>"Your pathetic species' time has come to an end.  Thanks for the tote bag."</p>
                </div> <!-- end .caption -->
            </div> <!-- end .thumbnail -->
        </div> <!-- end .testimonial -->

        <div class="testimonial col-sm-2 col-xs-6">
            <div class="thumbnail">
                <img src="img/hs_male_2.jpg" alt="">
                <div class="caption">
                    <h3>Chester</h3>
                    <h4>Houston, TX</h4>
                    <p>"I want my money back.  Now."</p>
                </div> <!-- end .caption -->
            </div> <!-- end .thumbnail -->
        </div> <!-- end .testimonial -->

        <div class="testimonial col-sm-2 col-xs-6">
            <div class="thumbnail">
                <img src="img/hs_llama.jpg" alt="">
                <div class="caption">
                    <h3>Simon</h3>
                    <h4>Marion, KS</h4>
                    <p>"..."</p>
                </div> <!-- end .caption -->
            </div> <!-- end .thumbnail -->
        </div> <!-- end .testimonial -->

    </div> <!-- end Row 3 -->
</section>

<?php require_once './includes/footer.php'; 