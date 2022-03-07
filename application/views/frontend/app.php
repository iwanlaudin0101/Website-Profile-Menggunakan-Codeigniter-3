<?php $this->load->view('frontend/_header'); ?>


<!-- ====================================== -->
<!-- bagian content -->

  <!-- ======= Hero Section ======= -->
  <div id="hero" class="hero route bg-image" style="background-image: url(<?= base_url() ?>assets/img/work.jpg)">
    <div class="overlay-itro"></div>
    <div class="hero-content display-table">
      <div class="table-cell">
        <div class="container">
          <!--<p class="display-6 color-d">Hello, world!</p>-->
          <h1 class="hero-title mb-4">I am <?= $about->name ?></h1>
          <p class="hero-subtitle"><span class="typed" data-typed-items="<?php foreach($skills as $skill):
            echo "".$skill->title.", ";
            endforeach; ?>"></span></p>
          <!-- <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="#about" role="button">Learn More</a></p> -->
        </div>
      </div>
    </div>
  </div><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about-mf sect-pt4 route">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="box-shadow-full">
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-sm-6 col-md-5">
                      <div class="about-img">
                        <img src="<?= base_url('images/about/'.$about->image) ?>" class="img-fluid rounded b-shadow-a" alt="">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-7">
                      <div class="about-info">
                        <p><span class="title-s">Name: </span> <span><?= $about->name ?></span></p>
                        <p><span class="title-s">Address: </span> <span><?= $about->address ?></span></p>
                        <p><span class="title-s">Profile: </span> <span><?= $about->profile ?></span></p>
                        <p><span class="title-s">Whatsapp: </span> <span><?= $about->whatsapp ?></span></p>
                        <p><span class="title-s">Email: </span> <span><?= $about->email ?></span></p>
                      </div>
                    </div>
                  </div>
                  <div class="skill-mf">
                    <p class="title-s">Skill</p>
                    <p> 
                    <?php foreach($skills as $row) :?>
                    <span class="badge rounded-pill bg-<?= $row->color;?> text-white"><?=$row->title;?></span>
                    <?php endforeach; ?>
                    </p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="about-me pt-4 pt-md-0">
                    <div class="title-box-2">
                      <h5 class="title-left">
                        About me
                      </h5>
                    </div>
                    <p class="lead">
                     <?=$about->about_me?>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services-mf pt-5 route">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="title-box text-center">
              <h3 class="title-a">
                Services
              </h3>
              <div class="line-mf"></div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="service-box">
              <div class="service-ico">
                <span class="ico-circle"><i class="bi bi-briefcase"></i></span>
              </div>
              <div class="service-content">
                <h2 class="s-title">Web Design</h2>
                <p class="s-description text-center">
                  
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="service-box">
              <div class="service-ico">
                <span class="ico-circle"><i class="bi bi-card-checklist"></i></span>
              </div>
              <div class="service-content">
                <h2 class="s-title">Web Development</h2>
                <p class="s-description text-center">
                  
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="service-box">
              <div class="service-ico">
                <span class="ico-circle"><i class="bi bi-brightness-high"></i></span>
              </div>
              <div class="service-content">
                <h2 class="s-title">Graphic Design</h2>
                <p class="s-description text-center">
                  
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Services Section -->

    <!-- ======= Counter Section ======= -->
    <div class="section-counter paralax-mf bg-image" style="background-image: url(assets/img/counters-bg.jpg)">
      <div class="overlay-mf"></div>
      <div class="container position-relative">
        <div class="row">
          <div class="col-sm-3 col-lg-3">
            <div class="counter-box counter-box pt-4 pt-md-0">
              <div class="counter-ico">
                <span class="ico-circle"><i class="bi bi-check"></i></span>
              </div>
              <div class="counter-num">
                <p data-purecounter-start="0" data-purecounter-end="450" data-purecounter-duration="1" class="counter purecounter"></p>
                <span class="counter-text">WORKS COMPLETED</span>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-lg-3">
            <div class="counter-box pt-4 pt-md-0">
              <div class="counter-ico">
                <span class="ico-circle"><i class="bi bi-journal-richtext"></i></span>
              </div>
              <div class="counter-num">
                <p data-purecounter-start="0" data-purecounter-end="25" data-purecounter-duration="1" class="counter purecounter"></p>
                <span class="counter-text">YEARS OF EXPERIENCE</span>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-lg-3">
            <div class="counter-box pt-4 pt-md-0">
              <div class="counter-ico">
                <span class="ico-circle"><i class="bi bi-people"></i></span>
              </div>
              <div class="counter-num">
                <p data-purecounter-start="0" data-purecounter-end="550" data-purecounter-duration="1" class="counter purecounter"></p>
                <span class="counter-text">TOTAL CLIENTS</span>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-lg-3">
            <div class="counter-box pt-4 pt-md-0">
              <div class="counter-ico">
                <span class="ico-circle"><i class="bi bi-award"></i></span>
              </div>
              <div class="counter-num">
                <p data-purecounter-start="0" data-purecounter-end="48" data-purecounter-duration="1" class="counter purecounter"></p>
                <span class="counter-text">AWARD WON</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Counter Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="work" class="portfolio-mf sect-pt4 route">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="title-box text-center">
              <h3 class="title-a">
                Portofolio
              </h3>
              <div class="line-mf"></div>
            </div>
          </div>
        </div>
        <div class="row">
          <?php foreach($portofolio as $p): ?>
          <div class="col-md-4">
            <div class="work-box">
              <a href="<?= base_url('images/portofolio/'.$p->image)?>" data-gallery="portfolioGallery" class="portfolio-lightbox">
                <div class="work-img">
                  <img src="<?= base_url('images/portofolio/'.$p->image)?>" alt="" class="img-fluid">
                </div>
              </a>
              <div class="work-content">
                <div class="row">
                  <div class="col-sm-8">
                    <h2 class="w-title"><?= $p->title ?></h2>
                    <div class="w-more">
                      <span class="w-ctegory"><?= $p->category_title ?></span> / <span class="w-date"><?= date_format(new DateTime($p->date), 'F j, Y'); ?></span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="w-like">
                      <a href="#" data-bs-toggle="modal" data-bs-target="#<?= $p->slug ?>"> <span class="bi bi-info-circle"></span></a>
                    </div>

                    <!-- Modal -->
                  <div class="modal fade" id="<?= $p->slug ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><?= $p->title ?></h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <?= $p->description ?>
                        </div>
                        <div class="modal-footer">
                          <a target="_blank" class="btn btn-primary" href="<?= $p->link ?>" role="button">Open</a>
                        </div>
                      </div>
                    </div>
                  </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach ?>      
        </div>
      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Testimonials Section ======= -->
    <div class="testimonials paralax-mf bg-image" style="background-image: url(assets/img/overlay-bg.jpg)">
      <div class="overlay-mf"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-12">

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
              <div class="swiper-wrapper">

                <div class="swiper-slide">
                  <div class="testimonial-box">
                    <div class="author-test">
                      <img style="height: 10rem; width: 10rem;" src="<?= base_url('images/about/'.$about->image) ?>" alt="" class="rounded-circle b-shadow-a img-fluid">
                      <span class="author"><?= $about->name ?></span>
                    </div>
                    <div class="content-test">
                      <p class="description lead">
                        Do not measure the distance from a distance, let alone want to clarify the color.
                      </p>

                      <i class="bi bi-emoji-smile" style="font-size: 3rem"></i>
                    </div>
                  </div>
                </div><!-- End testimonial item -->
              </div>
              <div class="swiper-pagination"></div>
            </div>
            <!-- <div id="testimonial-mf" class="owl-carousel owl-theme">
        </div> -->
          </div>
        </div>
      </div>
    </div><!-- End Testimonials Section -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog-mf sect-pt4 route">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="title-box text-center">
              <h3 class="title-a">
                Event
              </h3>
              <div class="line-mf"></div>
            </div>
          </div>
        </div>
        <div class="row">
          <?php foreach($event as $e): ?>
          <div class="col-md-4">
            <div class="card card-blog">
              <div class="card-img">
                <a href="blog-single.html"><img src="<?= base_url('images/event/'.$e->image)?>" alt="" class="img-fluid"></a>
              </div>
              <div class="card-body">
                <div class="card-category-box">
                  <div class="card-category">
                    <h6 class="category"><?= $e->organizer ?></h6>
                  </div>
                </div>
                <h3 class="card-title"><a href="blog-single.html"><?= $e->title ?></a></h3>
              </div>
              <div class="card-footer">
                
                
                <div class="post-author">
                  <span class="bi bi-calendar"></span> <?= date_format(new DateTime($e->date), 'j, F Y'); ?>
                </div>
                <div class="post-date">
                  <a href="#" data-bs-toggle="modal" data-bs-target="#<?= $e->slug ?>">
                  <span class="bi bi-info-circle-fill"></span>
                  </a>

                  <!-- Modal -->
                  <div class="modal fade" id="<?= $e->slug ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><?= $e->title ?></h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <p class="card-description">
                            <?= $e->description ?>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section><!-- End Blog Section -->

    <!-- ======= Contact Section ======= -->
      <section id="contact" class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(assets/img/overlay-bg.jpg)">
      <div class="overlay-mf"></div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="contact-mf">
              <div id="contact" class="box-shadow-full">
                <div class="row">
                  <div class="col-md-6">
                    <div class="title-box-2">
                      <h5 class="title-left">
                        Send Message Us
                      </h5>
                    </div>
                    <div>
                      <div class="alert alert-success alert-dismissible fade show d-none my-alert" role="alert">
                        <strong>Terimakasih!</strong> Pesan anda sudah kami terima.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                      <form name="portofolio-contact-form">
                        <div class="row">
                          <div class="col-md-12 mb-3">
                            <div class="form-group">
                              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name">
                            </div>
                          </div>
                          <div class="col-md-12 mb-3">
                            <div class="form-group">
                              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">
                            </div>
                          </div>
                          <div class="col-md-12 mb-3">
                            <div class="form-group">
                              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
                            </div>
                          </div>
                          
                          <div class="col-md-12 text-center mt-3">
                            <button type="submit" class="button button-a button-big button-rouded btn-kirim">Send Message</button>

                            <button type="button" class="button button-a button-big button-rouded btn-loading d-none" disabled>
                              <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                              Loading...
                            </button>
                          </div>
                          
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="title-box-2 pt-4 pt-md-0">
                      <h5 class="title-left">
                        Get in Touch
                      </h5>
                    </div>
                    <div class="more-info">
                      <p class="lead">
                        Don't forget to leave message to discuss anything with me. Let's work together!
                      </p>
                      <ul class="list-ico">
                        <li><span class="bi bi-geo-alt"></span> <?= $about->address ?></li>
                        <li><span class="bi bi-phone"></span> <?= $about->whatsapp ?></li>
                        <li><span class="bi bi-envelope"></span> <?= $about->email ?></li>
                      </ul>
                    </div>
                    <div class="socials">
                      <ul>
                        <li><a target="_blank" href="https://web.facebook.com/iwan.laudin"><span class="ico-circle"><i class="bi bi-facebook"></i></span></a></li>
                        <li><a target="_blank" href="https://www.instagram.com/iwanlaudin/"><span class="ico-circle"><i class="bi bi-instagram"></i></span></a></li>
                        <li><a target="_blank" href="https://www.youtube.com/channel/UCKybMy6ipnbZTW3noa6h0PQ"><span class="ico-circle"><i class="bi bi-youtube"></i></span></a></li>
                        <li><a target="_blank" href="https://github.com/devqueryone"><span class="ico-circle"><i class="bi bi-github"></i></span></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->


<?php $this->load->view('frontend/_footer'); ?>