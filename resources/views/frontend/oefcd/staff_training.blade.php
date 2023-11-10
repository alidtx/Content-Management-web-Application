<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    @include('frontend.partials.metas')

    @include('frontend.partials.head')
</head>
 
<style> 
  .banner_img{ 
    background-image: url(../public/frontend/assets/img/oefcd/banner.jpg); 
    background-position: right top; 
    background-size: 70% 100%;
    background-color: rgba(13, 202, 76, 0.75);
  }
</style>

<body>
    @include('frontend.partials.topbar_oefcd')

    <!-- Navbar -->
    @include('frontend.partials.menus_oefcd')

  
    @include('frontend.partials.sections.banner_oefcd', ['page_title' => 'Staff Training'])
  
 <!-- Mission & Vision -->
 <section class="section_two">
    <div class="container"> 
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-12 col-md-6 profile-info my-5">  
                <h1 class="text-uppercase fs-3 mb-0 fw-bold">
                    Staff Training
                </h1>
                <div class="mb-0 mt-0 d-inline-block mx-auto" style="width: 100%; background-color: #86BC42; height: 8px"></div>
          
                    <table id="dataTable" class="table table-sm table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th width="45%">Name</th>
                                <th width="15%">Venue</th>
                                <th width="20%">Status</th> 
                                <!-- <th width="10%">Trainer</th>
                                <th width="10%">Trainee</th>   -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trainer_list as $list)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $list->title }} <br> <small>{{ date('d M Y', strtotime($list->start_at)) }} - 
                                        {{ date('d M Y', strtotime($list->end_at)) }}</small>
                                    </td>
                                    <td>{{ $list->venue }}</td>
                                    <td>  
                                        @if(strtotime(now()) > strtotime($list->start_at) && strtotime(now()) > strtotime($list->end_at))
                                            <span class="btn btn-sm btn-dark">Completed</span>
                                        @elseif(strtotime(now()) > strtotime($list->start_at) && strtotime(now()) < strtotime($list->end_at))
                                            <span class="btn btn-sm btn-primary">Ongoing</span>
                                        @else 
                                            <span class="btn btn-sm btn-warning">Upcoming</span> 
                                        @endif
                                    </td>
                                    <!-- <td><a href="" class="btn btn-sm btn-info"><i class="fas fa-eye"></i> View </a></td>
                                    <td><a href="" class="btn btn-sm btn-info"><i class="fas fa-eye"></i> View </a></td>   -->
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
            </div>   
        </div> 
    </div>
 </section> 
 

    <!-- Footer --> 

    @include('frontend.partials.footer_oefcd')

    @include('frontend.partials.footer-script')

  </body>

</html>