<!-- ===== slider section start ===== -->
@extends('frontend.landing')
@section('content')
    <!-- ===== Page title section start ===== -->
    <section>
        <div class="officer-banner d-flex justify-content-center align-items-center">
            <h1 class="text-uppercase text-white font-poppins">Officer Profile</h1>
        </div>
    </section>
    <!-- ===== Page title section end ===== -->

    <!-- ===== Page content section start ===== -->
    <main class="container mt-5">
        <!-- Profile -->
        <div class="profile shadow-sm p-3 mb-5 bg-light rounded">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-2 col-md-6 profile-img">
                    <img class="rounded" src="{{ asset('public/frontend/assets/img/officer_profile.jpg') }}"
                        style="width: 100%" />
                </div>
                <div class="col-10 profile-info">
                    <h1 class="fs-4 fw-bold text-primary">Mazharul Islam</h1>
                    <h1 class="fs-6">
                        <i class="bi bi-person-fill"></i><span class="mx-2 text-">System Analyst</span>
                    </h1>
                    <h1 class="fs-6">
                        <i class="bi bi-telephone-fill"></i><span class="mx-2">8801673223736</span>
                    </h1>
                    <h1 class="fs-6">
                        <i class="bi bi-at"></i><span class="mx-2">tuhin@bup.edu.bd</span>
                    </h1>
                    <h2 class="fs-6 fw-bolder">
                        Information & Communication Technology (ICT) Centre
                    </h2>
                </div>
            </div>
            <hr />
            <div class="profile-nav nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link  active" id="pills-overview-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-overview" type="button" role="tab" aria-controls="pills-overview"
                        aria-selected="true">Overview</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-edu-tab" data-bs-toggle="pill" data-bs-target="#pills-edu" type="button"
                        role="tab" aria-controls="pills-edu" aria-selected="true">Education</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-exp-tab" data-bs-toggle="pill" data-bs-target="#pills-exp" type="button"
                        role="tab" aria-controls="pills-exp" aria-selected="true">Experience</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-soc-tab" data-bs-toggle="pill" data-bs-target="#pills-soc" type="button"
                        role="tab" aria-controls="pills-soc" aria-selected="true">Social Media</a>
                </li>
            </div>
        </div>
        <article class="content shadow-sm p-3 mb-5 bg-light rounded">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-overview" role="tabpanel"
                    aria-labelledby="pills-overview-tab" tabindex="0">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa exercitationem adipisci fugiat deleniti
                        corrupti cupiditate doloremque voluptatem velit eius, atque vel numquam quod voluptates veniam cum
                        laborum accusamus laudantium consectetur quasi? Placeat quibusdam earum dolorem adipisci maiores
                        dolorum quos temporibus debitis fuga necessitatibus! In saepe quos, ab possimus asperiores dicta.am
                        cum laborum accusamus laudantium consectetur quasi? Placeat quibusdam earum dolorem adipisci maiores
                        dolorum quos temporibus debitis fuga necessitatibus! In saepe quos, ab possimus asperiores dicta.
                    </p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa exercitationem adipisci fugiat deleniti
                        corrupti cupiditate doloremque voluptatem velit eius, atque vel numquam quod voluptates veniam cum
                        laborum accusamus laudantium consectetur quasi? Placeat quibusdam earum dolorem adipisci maiores
                        dolorum quos temporibus debitis fuga necessitatibus! In saepe quos, ab possimus asperiores dicta.am
                        cum laborum accusamus laudantium consectetur quasi? Placeat quibusdam earum dolorem adipisci maiores
                        dolorum quos temporibus debitis fuga necessitatibus! In saepe quos, ab possimus asperiores dicta.
                    </p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa exercitationem adipisci fugiat deleniti
                        corrupti cupiditate doloremque voluptatem velit eius, atque vel numquam quod voluptates veniam cum
                        laborum accusamus laudantium consectetur quasi? Placeat quibusdam earum dolorem adipisci maiores
                        dolorum quos temporibus debitis fuga necessitatibus! In saepe quos, ab possimus asperiores dicta.am
                        cum laborum accusamus laudantium consectetur quasi? Placeat quibusdam earum dolorem adipisci maiores
                        dolorum quos temporibus debitis fuga necessitatibus! In saepe quos, ab possimus asperiores dicta.
                    </p>
                </div>
                <div class="tab-pane fade" id="pills-edu" role="tabpanel" aria-labelledby="pills-edu-tab" tabindex="0">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa exercitationem adipisci fugiat deleniti
                        corrupti cupiditate doloremque voluptatem velit eius, atque vel numquam quod voluptates veniam cum
                        laborum accusamus laudantium consectetur quasi? Placeat quibusdam earum dolorem adipisci maiores
                        dolorum quos temporibus debitis fuga necessitatibus! In saepe quos, ab possimus asperiores dicta.am
                        cum laborum accusamus laudantium consectetur quasi? Placeat quibusdam earum dolorem adipisci maiores
                        dolorum quos temporibus debitis fuga necessitatibus! In saepe quos, ab possimus asperiores dicta.
                    </p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa exercitationem adipisci fugiat deleniti
                        corrupti cupiditate doloremque voluptatem velit eius, atque vel numquam quod voluptates veniam cum
                        laborum accusamus laudantium consectetur quasi? Placeat quibusdam earum dolorem adipisci maiores
                        dolorum quos temporibus debitis fuga necessitatibus! In saepe quos, ab possimus asperiores dicta.am
                        cum laborum accusamus laudantium consectetur quasi? Placeat quibusdam earum dolorem adipisci maiores
                        dolorum quos temporibus debitis fuga necessitatibus! In saepe quos, ab possimus asperiores dicta.
                    </p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa exercitationem adipisci fugiat deleniti
                        corrupti cupiditate doloremque voluptatem velit eius, atque vel numquam quod voluptates veniam cum
                        laborum accusamus laudantium consectetur quasi? Placeat quibusdam earum dolorem adipisci maiores
                        dolorum quos temporibus debitis fuga necessitatibus! In saepe quos, ab possimus asperiores dicta.am
                        cum laborum accusamus laudantium consectetur quasi? Placeat quibusdam earum dolorem adipisci maiores
                        dolorum quos temporibus debitis fuga necessitatibus! In saepe quos, ab possimus asperiores dicta.
                    </p>
                </div>
                <div class="tab-pane fade" id="pills-exp" role="tabpanel" aria-labelledby="pills-exp-tab" tabindex="0">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa exercitationem adipisci fugiat deleniti
                        corrupti cupiditate doloremque voluptatem velit eius, atque vel numquam quod voluptates veniam cum
                        laborum accusamus laudantium consectetur quasi? Placeat quibusdam earum dolorem adipisci maiores
                        dolorum quos temporibus debitis fuga necessitatibus! In saepe quos, ab possimus asperiores dicta.am
                        cum laborum accusamus laudantium consectetur quasi? Placeat quibusdam earum dolorem adipisci maiores
                        dolorum quos temporibus debitis fuga necessitatibus! In saepe quos, ab possimus asperiores dicta.
                    </p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa exercitationem adipisci fugiat deleniti
                        corrupti cupiditate doloremque voluptatem velit eius, atque vel numquam quod voluptates veniam cum
                        laborum accusamus laudantium consectetur quasi? Placeat quibusdam earum dolorem adipisci maiores
                        dolorum quos temporibus debitis fuga necessitatibus! In saepe quos, ab possimus asperiores dicta.am
                        cum laborum accusamus laudantium consectetur quasi? Placeat quibusdam earum dolorem adipisci maiores
                        dolorum quos temporibus debitis fuga necessitatibus! In saepe quos, ab possimus asperiores dicta.
                    </p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa exercitationem adipisci fugiat deleniti
                        corrupti cupiditate doloremque voluptatem velit eius, atque vel numquam quod voluptates veniam cum
                        laborum accusamus laudantium consectetur quasi? Placeat quibusdam earum dolorem adipisci maiores
                        dolorum quos temporibus debitis fuga necessitatibus! In saepe quos, ab possimus asperiores dicta.am
                        cum laborum accusamus laudantium consectetur quasi? Placeat quibusdam earum dolorem adipisci maiores
                        dolorum quos temporibus debitis fuga necessitatibus! In saepe quos, ab possimus asperiores dicta.
                    </p>
                </div>
                <div class="tab-pane fade" id="pills-soc" role="tabpanel" aria-labelledby="pills-soc-tab" tabindex="0">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa exercitationem adipisci fugiat deleniti
                        corrupti cupiditate doloremque voluptatem velit eius, atque vel numquam quod voluptates veniam cum
                        laborum accusamus laudantium consectetur quasi? Placeat quibusdam earum dolorem adipisci maiores
                        dolorum quos temporibus debitis fuga necessitatibus! In saepe quos, ab possimus asperiores dicta.am
                        cum laborum accusamus laudantium consectetur quasi? Placeat quibusdam earum dolorem adipisci maiores
                        dolorum quos temporibus debitis fuga necessitatibus! In saepe quos, ab possimus asperiores dicta.
                    </p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa exercitationem adipisci fugiat deleniti
                        corrupti cupiditate doloremque voluptatem velit eius, atque vel numquam quod voluptates veniam cum
                        laborum accusamus laudantium consectetur quasi? Placeat quibusdam earum dolorem adipisci maiores
                        dolorum quos temporibus debitis fuga necessitatibus! In saepe quos, ab possimus asperiores dicta.am
                        cum laborum accusamus laudantium consectetur quasi? Placeat quibusdam earum dolorem adipisci maiores
                        dolorum quos temporibus debitis fuga necessitatibus! In saepe quos, ab possimus asperiores dicta.
                    </p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa exercitationem adipisci fugiat deleniti
                        corrupti cupiditate doloremque voluptatem velit eius, atque vel numquam quod voluptates veniam cum
                        laborum accusamus laudantium consectetur quasi? Placeat quibusdam earum dolorem adipisci maiores
                        dolorum quos temporibus debitis fuga necessitatibus! In saepe quos, ab possimus asperiores dicta.am
                        cum laborum accusamus laudantium consectetur quasi? Placeat quibusdam earum dolorem adipisci maiores
                        dolorum quos temporibus debitis fuga necessitatibus! In saepe quos, ab possimus asperiores dicta.
                    </p>

                </div>
            </div>
        </article>
    </main>
    <!-- ===== Page content section end ===== -->
@endsection
