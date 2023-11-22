<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SEU TÍTULO</title>
    <meta content="" name="description">

    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/brand/logo.png') }}" rel="icon">
    <link href="{{ asset('new_frontassets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('new_front/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('new_front/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('new_front/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('new_front/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('new_front/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('new_front/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('new_front/assets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: FlexStart - v1.6.0
    * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top header-scrolled">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="#" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/brand/logo.png') }}" alt="">
                <span>SUA EMPRESA</span>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active " href="#recado">Recados</a></li>
                    <li><a class="nav-link scrollto" href="#portfolio">Campanhas</a></li>
                    <li><a class="nav-link scrollto" href="#team">Destaques</a></li>
                    <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a class="nav-link scrollto active " href="{{ asset('site/archives/') }}"
                                    target="_blank">Archive 1</a></li>
                            <li><a class="nav-link scrollto active " href="{{ asset('site/archives/') }}"
                                    target="_blank">Archive 2</a></li>
                        </ul>
                    </li>
                    <li><a class="getstarted scrollto" href="{{ route('admin.login') }}" target="_blank">Admin Section</a>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->


    <!-- ======= Hero Section ======= -->

    <section id="hero" class="values">


        {{-- <div class="container">
           <div class="row">
               <div class="col-lg-6 d-flex flex-column justify-content-center">
                   <h1 data-aos="fade-up">We offer modern solutions for growing your business</h1>
                   <h2 data-aos="fade-up" data-aos-delay="400">We are team of talented designers making websites with
                       Bootstrap</h2>
                   <div data-aos="fade-up" data-aos-delay="600">
                       <div class="text-center text-lg-start">
                           <a href="#about"
                              class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                               <span>Get Started</span>
                               <i class="bi bi-arrow-right"></i>
                           </a>
                       </div>
                   </div>
              </div>
              <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                   <img src="{{asset('new_front/assets/img/hero-img.png')}}" class="img-fluid" alt="">
               </div>
          </div>
     </div> --}}

    </section><!-- End Hero -->

    <main id="main">

        {{--     inicio form --}}
        {{-- <section id="sugestoes" class="about">
        <div class="container aos-init aos-animate" data-aos="fade-up">
            <header class="section-header">
                <p>Faça parte do comitê!</p>
                <h3>Queremos te ouvir!
                    <br/>

                    Esse espaço é destinado pra você deixar aquela ideia, dar uma sugestão ou até mesmo fazer uma
                    reclamação. É aberto também a qualquer outro assunto que podemos levar em comitê.
                    Assim podemos estudar, analisar e melhorar para o você e todos os colaboradores da empresa.
        <br/>
                    Sinta-se a vontade!</h3>

            </header>
            <div class="col-lg-12    d-flex flex-column justify-content-center aos-init aos-animate" data-aos="fade-up"
                 data-aos-delay="200">
                <div class="content">

                    @if (count($errors) > 0)
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Preencha os dados corretamente</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($message = \Illuminate\Support\Facades\Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Obrigado!</strong> {{$message}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($message = \Illuminate\Support\Facades\Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Oooops!</strong> {{$message}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{url('/contato')}}" method="post">
                        {{csrf_field()}}
                        <div class="row gy-4">
                            <div class="col-md-12"><input type="text" name="name" class="form-control"
                                                          placeholder="Nome completo"></div>
                            <div class="col-md-12"><input type="text" class="form-control" name="subject"
                                                          placeholder="Assunto"></div>
                            <div class="col-md-12"><textarea class="form-control" name="message" rows="6"
                                                             placeholder="Mensagem"
                                                             style="overflow:auto;resize:none"></textarea></div>
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> --}}
        {{--    fim form --}}

        <!-- ======= About Section ======= -->

        <!-- ======= Values Section ======= -->
        <section id="values" class="values">

            <div class="col-lg-12    d-flex flex-column justify-content-center aos-init aos-animate" data-aos="fade-up"
                data-aos-delay="200">
                <div class="content">
                </div>
            </div>

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <p>Missão, Visão e Valores</p>
                </header>

                <div class="row">

                    <div class="col-lg-4">
                        <div class="box" data-aos="fade-up" data-aos-delay="200">
                            <img src="{{ asset('new_front/assets/img/values-1.png') }}" class="img-fluid"
                                alt="">
                            <h3>Missão</h3>
                            <p>Lorem ipsum dolor sit amet. Aut alias sunt et quae internos eos quidem sapiente et ipsum
                                vitae ea porro asperiores. Vel sapiente culpa qui atque repellendus aut deleniti magni
                                sed quisquam deserunt hic quia temporibus? </p>
                            <p>Qui numquam incidunt rem perspiciatis quia et dolor voluptas vel deleniti distinctio non
                                delectus dolores aut neque sunt. Nam tempora internos ut tempore optio id rerum
                                asperiores ab quia laboriosam a voluptas consequatur. Sed quisquam quae in laboriosam
                                nisi est ullam temporibus qui deleniti dolores non tempora recusandae sit officia
                                voluptates. </p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="box" data-aos="fade-up" data-aos-delay="400">
                            <img src="{{ asset('new_front/assets/img/values-2.png') }}" class="img-fluid"
                                alt="">
                            <h3>Visão</h3>
                            <p>Lorem ipsum dolor sit amet. Aut alias sunt et quae internos eos quidem sapiente et ipsum
                                vitae ea porro asperiores. Vel sapiente culpa qui atque repellendus aut deleniti magni
                                sed quisquam deserunt hic quia temporibus? </p>
                            <p>Qui numquam incidunt rem perspiciatis quia et dolor voluptas vel deleniti distinctio non
                                delectus dolores aut neque sunt. Nam tempora internos ut tempore optio id rerum
                                asperiores ab quia laboriosam a voluptas consequatur. Sed quisquam quae in laboriosam
                                nisi est ullam temporibus qui deleniti dolores non tempora recusandae sit officia
                                voluptates. </p>

                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="box" data-aos="fade-up" data-aos-delay="600">
                            <img src="{{ asset('new_front/assets/img/values-3.png') }}" class="img-fluid"
                                alt="">
                            <h3>Valores</h3>
                            <p>Lorem ipsum dolor sit amet. Aut alias sunt et quae internos eos quidem sapiente et ipsum
                                vitae ea porro asperiores. Vel sapiente culpa qui atque repellendus aut deleniti magni
                                sed quisquam deserunt hic quia temporibus? </p>
                            <p>Qui numquam incidunt rem perspiciatis quia et dolor voluptas vel deleniti distinctio non
                                delectus dolores aut neque sunt. Nam tempora internos ut tempore optio id rerum
                                asperiores ab quia laboriosam a voluptas consequatur. Sed quisquam quae in laboriosam
                                nisi est ullam temporibus qui deleniti dolores non tempora recusandae sit officia
                                voluptates. </p>
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- End Values Section -->


        <!-- Inicio recados -->

        <section id="recado" class="portfolio">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Recados</h2>
                    <p>Nossos recados</p>
                </header>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        {{-- <ul id="portfolio-flters">
                                       <li data-filter="*" class="filter-active">Tudo</li>
                                       <li data-filter=".filter-app">App</li>
                                       <li data-filter=".filter-card">Card</li>
                                       <li data-filter=".filter-web">Web</li>
                                     </ul> --}}
                    </div>
                </div>

                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

                    @foreach ($slides as $slide)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($slide->cover) }}"
                                    class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>{{ $slide->title }}</h4>
                                    <div class="portfolio-links">
                                        <a href="{{ \Illuminate\Support\Facades\Storage::url($slide->cover) }}"
                                            data-gallery="portfolioGallery" class="portfokio-lightbox"
                                            title="{{ $slide->message }}"><i class="bi bi-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>

        </section><!-- End Portfolio Section -->


        <!-- Fim dos recados -->

        <!-- ======= Testimonials Section ======= -->
        {{--          <section id="testimonials" class="testimonials"> --}}

        {{--            <div class="container" data-aos="fade-up"> --}}

        {{--              <header class="section-header"> --}}
        {{--                <h2>Recados</h2> --}}
        {{--                <p>Fique ligado em nossos recados</p> --}}
        {{--              </header> --}}

        {{--              <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200"> --}}
        {{--                <div class="swiper-wrapper"> --}}

        {{--                  @foreach ($slides as $slide) --}}
        {{--                    <div class="swiper-slide"> --}}
        {{--                      <div class="testimonial-item"> --}}
        {{--                        <img src="{{\Illuminate\Support\Facades\Storage::url($slide->cover)}}" alt=""> --}}
        {{--                      </div> --}}
        {{--                      <div class="portfolio-links"> --}}
        {{--                        <a href="{{\Illuminate\Support\Facades\Storage::url($slide->cover)}}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="{{$slide->title}}"><i class="bi bi-plus"></i></a> --}}
        {{--                      </div> --}}
        {{--                    </div><!-- End testimonial item --> --}}
        {{--                  @endforeach --}}

        {{--                </div> --}}
        {{--                <div class="swiper-pagination"></div> --}}
        {{--              </div> --}}

        {{--            </div> --}}

        {{--          </section><!-- End Testimonials Section --> --}}

        {{--          <!-- ======= Counts Section ======= --> --}}
        {{--           <section id="counts" class="counts"> --}}
        {{--            <div class="container" data-aos="fade-up"> --}}

        {{--              <div class="row gy-4"> --}}

        {{--                <div class="col-lg-3 col-md-6"> --}}
        {{--                  <div class="count-box"> --}}
        {{--                    <i class="bi bi-emoji-smile"></i> --}}
        {{--                    <div> --}}
        {{--                      <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span> --}}
        {{--                      <p>Happy Clients</p> --}}
        {{--                    </div> --}}
        {{--                  </div> --}}
        {{--                </div> --}}

        {{--                <div class="col-lg-3 col-md-6"> --}}
        {{--                  <div class="count-box"> --}}
        {{--                    <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i> --}}
        {{--                    <div> --}}
        {{--                      <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span> --}}
        {{--                      <p>Projects</p> --}}
        {{--                    </div> --}}
        {{--                  </div> --}}
        {{--                </div> --}}

        {{--                <div class="col-lg-3 col-md-6"> --}}
        {{--                  <div class="count-box"> --}}
        {{--                    <i class="bi bi-headset" style="color: #15be56;"></i> --}}
        {{--                    <div> --}}
        {{--                      <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span> --}}
        {{--                      <p>Hours Of Support</p> --}}
        {{--                    </div> --}}
        {{--                  </div> --}}
        {{--                </div> --}}

        {{--                <div class="col-lg-3 col-md-6"> --}}
        {{--                  <div class="count-box"> --}}
        {{--                    <i class="bi bi-people" style="color: #bb0852;"></i> --}}
        {{--                    <div> --}}
        {{--                      <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span> --}}
        {{--                      <p>Hard Workers</p> --}}
        {{--                    </div> --}}
        {{--                  </div> --}}
        {{--                </div> --}}

        {{--              </div> --}}

        {{--            </div> --}}
        {{--          </section><!-- End Counts Section --> --}}

        {{--          <!-- ======= Features Section ======= --> --}}
        {{--          <section id="features" class="features"> --}}

        {{--            <div class="container" data-aos="fade-up"> --}}

        {{--              <header class="section-header"> --}}
        {{--                <h2>Features</h2> --}}
        {{--                <p>Laboriosam et omnis fuga quis dolor direda fara</p> --}}
        {{--              </header> --}}

        {{--              <div class="row"> --}}

        {{--                <div class="col-lg-6"> --}}
        {{--                  <img src="{{asset('new_front/assets/img/features.png')}}" class="img-fluid" alt=""> --}}
        {{--                </div> --}}

        {{--                <div class="col-lg-6 mt-5 mt-lg-0 d-flex"> --}}
        {{--                  <div class="row align-self-center gy-4"> --}}

        {{--                    <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200"> --}}
        {{--                      <div class="feature-box d-flex align-items-center"> --}}
        {{--                        <i class="bi bi-check"></i> --}}
        {{--                        <h3>Eos aspernatur rem</h3> --}}
        {{--                      </div> --}}
        {{--                    </div> --}}

        {{--                    <div class="col-md-6" data-aos="zoom-out" data-aos-delay="300"> --}}
        {{--                      <div class="feature-box d-flex align-items-center"> --}}
        {{--                        <i class="bi bi-check"></i> --}}
        {{--                        <h3>Facilis neque ipsa</h3> --}}
        {{--                      </div> --}}
        {{--                    </div> --}}

        {{--                    <div class="col-md-6" data-aos="zoom-out" data-aos-delay="400"> --}}
        {{--                      <div class="feature-box d-flex align-items-center"> --}}
        {{--                        <i class="bi bi-check"></i> --}}
        {{--                        <h3>Volup amet voluptas</h3> --}}
        {{--                      </div> --}}
        {{--                    </div> --}}

        {{--                    <div class="col-md-6" data-aos="zoom-out" data-aos-delay="500"> --}}
        {{--                      <div class="feature-box d-flex align-items-center"> --}}
        {{--                        <i class="bi bi-check"></i> --}}
        {{--                        <h3>Rerum omnis sint</h3> --}}
        {{--                      </div> --}}
        {{--                    </div> --}}

        {{--                    <div class="col-md-6" data-aos="zoom-out" data-aos-delay="600"> --}}
        {{--                      <div class="feature-box d-flex align-items-center"> --}}
        {{--                        <i class="bi bi-check"></i> --}}
        {{--                        <h3>Alias possimus</h3> --}}
        {{--                      </div> --}}
        {{--                    </div> --}}

        {{--                    <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700"> --}}
        {{--                      <div class="feature-box d-flex align-items-center"> --}}
        {{--                        <i class="bi bi-check"></i> --}}
        {{--                        <h3>Repellendus mollitia</h3> --}}
        {{--                      </div> --}}
        {{--                    </div> --}}

        {{--                  </div> --}}
        {{--                </div> --}}

        {{--              </div> <!-- / row --> --}}

        {{--              <!-- Feature Tabs --> --}}
        {{--              <div class="row feture-tabs" data-aos="fade-up"> --}}
        {{--                <div class="col-lg-6"> --}}
        {{--                  <h3>Neque officiis dolore maiores et exercitationem quae est seda lidera pat claero</h3> --}}

        {{--                  <!-- Tabs --> --}}
        {{--                  <ul class="nav nav-pills mb-3"> --}}
        {{--                    <li> --}}
        {{--                      <a class="nav-link active" data-bs-toggle="pill" href="#tab1">Saepe fuga</a> --}}
        {{--                    </li> --}}
        {{--                    <li> --}}
        {{--                      <a class="nav-link" data-bs-toggle="pill" href="#tab2">Voluptates</a> --}}
        {{--                    </li> --}}
        {{--                    <li> --}}
        {{--                      <a class="nav-link" data-bs-toggle="pill" href="#tab3">Corrupti</a> --}}
        {{--                    </li> --}}
        {{--                  </ul><!-- End Tabs --> --}}

        {{--                  <!-- Tab Content --> --}}
        {{--                  <div class="tab-content"> --}}

        {{--                    <div class="tab-pane fade show active" id="tab1"> --}}
        {{--                      <p>Consequuntur inventore voluptates consequatur aut vel et. Eos doloribus expedita. Sapiente atque consequatur minima nihil quae aspernatur quo suscipit voluptatem.</p> --}}
        {{--                      <div class="d-flex align-items-center mb-2"> --}}
        {{--                        <i class="bi bi-check2"></i> --}}
        {{--                        <h4>Repudiandae rerum velit modi et officia quasi facilis</h4> --}}
        {{--                      </div> --}}
        {{--                      <p>Laborum omnis voluptates voluptas qui sit aliquam blanditiis. Sapiente minima commodi dolorum non eveniet magni quaerat nemo et.</p> --}}
        {{--                      <div class="d-flex align-items-center mb-2"> --}}
        {{--                        <i class="bi bi-check2"></i> --}}
        {{--                        <h4>Incidunt non veritatis illum ea ut nisi</h4> --}}
        {{--                      </div> --}}
        {{--                      <p>Non quod totam minus repellendus autem sint velit. Rerum debitis facere soluta tenetur. Iure molestiae assumenda sunt qui inventore eligendi voluptates nisi at. Dolorem quo tempora. Quia et perferendis.</p> --}}
        {{--                    </div><!-- End Tab 1 Content --> --}}

        {{--                    <div class="tab-pane fade show" id="tab2"> --}}
        {{--                      <p>Consequuntur inventore voluptates consequatur aut vel et. Eos doloribus expedita. Sapiente atque consequatur minima nihil quae aspernatur quo suscipit voluptatem.</p> --}}
        {{--                      <div class="d-flex align-items-center mb-2"> --}}
        {{--                        <i class="bi bi-check2"></i> --}}
        {{--                        <h4>Repudiandae rerum velit modi et officia quasi facilis</h4> --}}
        {{--                      </div> --}}
        {{--                      <p>Laborum omnis voluptates voluptas qui sit aliquam blanditiis. Sapiente minima commodi dolorum non eveniet magni quaerat nemo et.</p> --}}
        {{--                      <div class="d-flex align-items-center mb-2"> --}}
        {{--                        <i class="bi bi-check2"></i> --}}
        {{--                        <h4>Incidunt non veritatis illum ea ut nisi</h4> --}}
        {{--                      </div> --}}
        {{--                      <p>Non quod totam minus repellendus autem sint velit. Rerum debitis facere soluta tenetur. Iure molestiae assumenda sunt qui inventore eligendi voluptates nisi at. Dolorem quo tempora. Quia et perferendis.</p> --}}
        {{--                    </div><!-- End Tab 2 Content --> --}}

        {{--                    <div class="tab-pane fade show" id="tab3"> --}}
        {{--                      <p>Consequuntur inventore voluptates consequatur aut vel et. Eos doloribus expedita. Sapiente atque consequatur minima nihil quae aspernatur quo suscipit voluptatem.</p> --}}
        {{--                      <div class="d-flex align-items-center mb-2"> --}}
        {{--                        <i class="bi bi-check2"></i> --}}
        {{--                        <h4>Repudiandae rerum velit modi et officia quasi facilis</h4> --}}
        {{--                      </div> --}}
        {{--                      <p>Laborum omnis voluptates voluptas qui sit aliquam blanditiis. Sapiente minima commodi dolorum non eveniet magni quaerat nemo et.</p> --}}
        {{--                      <div class="d-flex align-items-center mb-2"> --}}
        {{--                        <i class="bi bi-check2"></i> --}}
        {{--                        <h4>Incidunt non veritatis illum ea ut nisi</h4> --}}
        {{--                      </div> --}}
        {{--                      <p>Non quod totam minus repellendus autem sint velit. Rerum debitis facere soluta tenetur. Iure molestiae assumenda sunt qui inventore eligendi voluptates nisi at. Dolorem quo tempora. Quia et perferendis.</p> --}}
        {{--                    </div><!-- End Tab 3 Content --> --}}

        {{--                  </div> --}}

        {{--                </div> --}}

        {{--                <div class="col-lg-6"> --}}
        {{--                  <img src="{{asset('new_front/assets/img/features-2.png')}}" class="img-fluid" alt=""> --}}
        {{--                </div> --}}

        {{--              </div><!-- End Feature Tabs --> --}}

        {{--              <!-- Feature Icons --> --}}
        {{--              <div class="row feature-icons" data-aos="fade-up"> --}}
        {{--                <h3>Ratione mollitia eos ab laudantium rerum beatae quo</h3> --}}

        {{--                <div class="row"> --}}

        {{--                  <div class="col-xl-4 text-center" data-aos="fade-right" data-aos-delay="100"> --}}
        {{--                    <img src="{{asset('new_front/assets/img/features-3.png')}}" class="img-fluid p-4" alt=""> --}}
        {{--                  </div> --}}

        {{--                  <div class="col-xl-8 d-flex content"> --}}
        {{--                    <div class="row align-self-center gy-4"> --}}

        {{--                      <div class="col-md-6 icon-box" data-aos="fade-up"> --}}
        {{--                        <i class="ri-line-chart-line"></i> --}}
        {{--                        <div> --}}
        {{--                          <h4>Corporis voluptates sit</h4> --}}
        {{--                          <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p> --}}
        {{--                        </div> --}}
        {{--                      </div> --}}

        {{--                      <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100"> --}}
        {{--                        <i class="ri-stack-line"></i> --}}
        {{--                        <div> --}}
        {{--                          <h4>Ullamco laboris nisi</h4> --}}
        {{--                          <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p> --}}
        {{--                        </div> --}}
        {{--                      </div> --}}

        {{--                      <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200"> --}}
        {{--                        <i class="ri-brush-4-line"></i> --}}
        {{--                        <div> --}}
        {{--                          <h4>Labore consequatur</h4> --}}
        {{--                          <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p> --}}
        {{--                        </div> --}}
        {{--                      </div> --}}

        {{--                      <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300"> --}}
        {{--                        <i class="ri-magic-line"></i> --}}
        {{--                        <div> --}}
        {{--                          <h4>Beatae veritatis</h4> --}}
        {{--                          <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta</p> --}}
        {{--                        </div> --}}
        {{--                      </div> --}}

        {{--                      <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400"> --}}
        {{--                        <i class="ri-command-line"></i> --}}
        {{--                        <div> --}}
        {{--                          <h4>Molestiae dolor</h4> --}}
        {{--                          <p>Et fuga et deserunt et enim. Dolorem architecto ratione tensa raptor marte</p> --}}
        {{--                        </div> --}}
        {{--                      </div> --}}

        {{--                      <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500"> --}}
        {{--                        <i class="ri-radar-line"></i> --}}
        {{--                        <div> --}}
        {{--                          <h4>Explicabo consectetur</h4> --}}
        {{--                          <p>Est autem dicta beatae suscipit. Sint veritatis et sit quasi ab aut inventore</p> --}}
        {{--                        </div> --}}
        {{--                      </div> --}}

        {{--                    </div> --}}
        {{--                  </div> --}}

        {{--                </div> --}}

        {{--              </div><!-- End Feature Icons --> --}}

        {{--            </div> --}}

        {{--          </section><!-- End Features Section --> --}}

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Campanhas</h2>
                    <p>Nossas campanhas</p>
                </header>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        {{--                   <ul id="portfolio-flters"> --}}
                        {{--                    <li data-filter="*" class="filter-active">Tudo</li> --}}
                        {{--                    <li data-filter=".filter-app">App</li> --}}
                        {{--                    <li data-filter=".filter-card">Card</li> --}}
                        {{--                    <li data-filter=".filter-web">Web</li> --}}
                        {{--                  </ul> --}}
                    </div>
                </div>

                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">


                    @foreach ($campaigns as $campaign)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($campaign->cover) }}"
                                    class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>{{ $campaign->title }}</h4>
                                    <div class="portfolio-links">
                                        <a href="{{ \Illuminate\Support\Facades\Storage::url($campaign->cover) }}"
                                            data-gallery="portfolioGallery" class="portfokio-lightbox"
                                            title="{{ $campaign->description }}"><i class="bi bi-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>

        </section><!-- End Portfolio Section -->


        <!-- ======= Team Section ======= -->
        <section id="team" class="team">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Equipe</h2>
                    <p>Os destaques</p>
                </header>

                <div class="row gy-4">

                    @foreach ($workers as $worker)
                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                            data-aos-delay="100">
                            <div class="member">
                                <div class="member-info">
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($worker->cover) }}"
                                        class="img-fluid" alt="">
                                </div>
                                <div class="member-info">
                                    <h4>{{ $worker->name }}</h4>
                                    {!! $worker->comments !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        </section><!-- End Team Section -->


        <!-- ======= Team Section ======= -->
        {{--    <section id="financeiro" class="team"> --}}

        {{--        <div class="container" data-aos="fade-up"> --}}

        {{--            <header class="section-header"> --}}
        {{--                <h2>Financeiro</h2> --}}
        {{--                <p>Nosso caixa</p> --}}
        {{--            </header> --}}

        {{--            <div class="row gy-4"> --}}

        {{--                <table class="table table-bordered text-center"> --}}
        {{--                    <thead> --}}
        {{--                    <tr> --}}
        {{--                        <th>Data Cadastro</th> --}}
        {{--                        <th>Categoria</th> --}}
        {{--                        <th>Arquivo</th> --}}
        {{--                    </tr> --}}
        {{--                    </thead> --}}
        {{--                    <tbody> --}}
        {{--                    @foreach ($payboxes as $paybox) --}}
        {{--                        <tr> --}}

        {{--                            <td class="align-middle"> --}}
        {{--                                <b>{{\Carbon\Carbon::parse($paybox->created_at)->format('d/m/Y H:i')}}</b></td> --}}
        {{--                            <td class="align-middle"><span>{{strtoupper($paybox->categories)}}</span></td> --}}
        {{--                            <td class="align-middle "><a target="_blank" --}}
        {{--                                                         href="{{\Illuminate\Support\Facades\Storage::url($paybox->cover)}}">Clique --}}
        {{--                                    aqui para abrir o caixa</a></td> --}}
        {{--                        </tr> --}}
        {{--                    @endforeach --}}
        {{--                    </tbody> --}}
        {{--                </table> --}}

        {{--            </div> --}}

        {{--        </div> --}}

        {{--    </section><!-- End Team Section --> --}}


        {{--          <section id="qualidade" class="team"> --}}

        {{--            <div class="container" data-aos="fade-up"> --}}

        {{--              <header class="section-header"> --}}
        {{--                <h2>Qualidade</h2> --}}
        {{--                <p>Selos de contato perfeito</p> --}}
        {{--              </header> --}}

        {{--              <div class="row gy-4"> --}}

        {{--                <table class="table table-bordered text-center"> --}}
        {{--                  <thead> --}}
        {{--                  <tr> --}}
        {{--                    <th>Foto</th> --}}
        {{--                    <th>Nome</th> --}}
        {{--                    <th>Selos</th> --}}
        {{--                    </h2> --}}
        {{--                  </tr> --}}
        {{--                  </thead> --}}
        {{--                  <tbody> --}}
        {{--                  @foreach ($qualitys as $quality) --}}
        {{--                      <tr> --}}
        {{--                        <td class="align-middle "><img src="{{\Illuminate\Support\Facades\Storage::url($quality->avatar)}}" --}}
        {{--                                                class="rounded-circle" width="140" height="140"></td> --}}
        {{--                                <td class="align-middle"><b>{{$quality->nome}}</b> --}}
        {{--                                </td> --}}
        {{--                                <td class="align-middle"> --}}
        {{--                                    <b><h2>{{$quality->qtd_selos}}</h2></b></td> --}}
        {{--                      </tr> --}}
        {{--                  @endforeach --}}
        {{--                  </tbody> --}}
        {{--              </table> --}}

        {{--              </div> --}}

        {{--            </div> --}}

        {{--          </section><!-- End qualitys Section --> --}}


        {{-- <section id="qualidade" class="portfolio">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <p>Monitoria</p>
                </header>

                <!-- <div class="row content-center" data-aos="fade-up" data-aos-delay="80">

                <div class="col-lg-12 col-md-12 portfolio-item filter-app">
                    <div class="portfolio-wrap ">
                        <img src="{{ asset('storage/commission/c.jpg') }}" class="img-fluid"
                             alt="">
                    </div>
                </div>

            </div>-->
                <div class="row" data-aos="fade-up" data-aos-delay="100">

                    @foreach ($monitorias as $monitoria)
                        <div class="col-lg-6 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap ">
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($monitoria->cover) }}"
                                    class="img-fluid" alt="">
                            </div>
                        </div>
                    @endforeach

                </div>

        </section> --}}


        <!--<section id="qualidade" class="portfolio">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <p>Contato perfeito</p>
            </header>

            <div class="row mt-7" data-aos="fade-up" data-aos-delay="100">
                @foreach ($qualitys_boss as $boss)
<div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap ">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($boss->avatar) }}" class="img-fluid"
                                 alt="">

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    </div>
@endforeach
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="100">
                @foreach ($qualitys_op_boss as $op_boss)
<div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap ">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($op_boss->avatar) }}" class="img-fluid"
                                 alt="">

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    </div>
@endforeach
            </div>

            <div class="row mt-3" data-aos="fade-up" data-aos-delay="100">
                @foreach ($qualitys_op as $op)
<div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($op->avatar) }}" class="img-fluid"
                                 alt="">

                        </div>
                    </div>
@endforeach
            </div>


        </div>

    </section>-->

        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>CLIENTES OU PRODUTOS</h2>
                    <p>Nosso portifólio</p>
                </header>

                <div class="clients-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide"><img src="{{ asset('new_front/assets/img/clients/client-1.png') }}"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('new_front/assets/img/clients/client-2.png') }}"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('new_front/assets/img/clients/client-3.png') }}"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('new_front/assets/img/clients/client-4.png') }}"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('new_front/assets/img/clients/client-5.png') }}"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('new_front/assets/img/clients/client-6.png') }}"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('new_front/assets/img/clients/client-7.png') }}"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('new_front/assets/img/clients/client-8.png') }}"
                                class="img-fluid" alt=""></div>

                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

        </section><!-- End Clients Section -->

    </main><!-- End #main -->

</body>
<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <a href="#recado" class="logo d-flex align-items-center">
                        <img src="{{ asset('assets/brand/logo.png') }}" alt="">
                        <span>SUA EMPRESA</span>
                    </a>
                    {{-- <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p> --}}
                    <div class="social-links mt-3">

                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">

                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Links uteis</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="https://chat.openai.com/"
                                target="_blank">CHAT GPT</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a
                                href="https://buscacepinter.correios.com.br/app/endereco/index.php"
                                target="_blank">Busca
                                CEP (Correios)</a></li>


                    </ul>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>TEXTO EXEMPLO</h4>
                    <ul>
                        <li>
                            <p>Lorem ipsum dolor sit amet. Sit earum odio eum placeat dolor ut fugit repellendus qui
                                minima tempora ex enim voluptas et dolor obcaecati. Qui iure placeat ad voluptatem
                                reprehenderit aut repellat perferendis non amet laboriosam et perferendis aliquid. Ut
                                voluptatem quod ab quidem dolorem non aliquid quaerat. </p>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span><a href="https://linkedin.com/in/rodrigodossantos8454"
                        target="_blank">Rodrigo dos Santos</a></span></strong>.
            All Rights Reserved
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('new_front/assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('new_front/assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('new_front/assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('new_front/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('new_front/assets/vendor/purecounter/purecounter.js') }}"></script>
<script src="{{ asset('new_front/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('new_front/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('new_front/assets/js/main.js') }}"></script>
</body>

</html>
