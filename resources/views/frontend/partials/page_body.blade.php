<main class="container mt-5">
  <!-- Academics Card -->
    <seciton class="">
        <div class="row">
             
            <div class="col-lg-12">
                <div class=" row d-flex justify-content-around">                    
                
                    <div class="shadow-sm p-3 mb-3 bg-light rounded program-type">
                        <h1 class="fs-4 fw-bold mb-0 text-uppercase text-primary">
                            {{ $page_info != '' ? $page_info->title : 'No Data Found' }}
                        </h1>
                    </div>   
                    <article class="content">
                        {!! $page_info != '' ? $page_info->description : ''  !!}
                    </article>    

                </div>
            </div>
        </div>
    </seciton>
</main>