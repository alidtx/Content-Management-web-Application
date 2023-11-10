@extends('frontend.landing')

@php
    $page_title = $info->program_title;
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
    @include('frontend.partials.sections.banner', ['page_title' => $page_title])



    <style>
        .academic-details {
            padding: 25px 0 25px 0;
            font-size: 1rem;
        }

        .aboutSidebar ul li {
            background: #198754;
            color: white;
            margin-bottom: 3px;
            border-left: 8px solid yellow;
            cursor: pointer;
            padding: 2px 0 3px 10px;
            color: black;
            font-size: 17px
        }

        .aboutSidebar ul li:hover {
            background: #486959;
        }

        .aboutSidebar ul a {
            color: black;
            text-decoration: none;
        }
        .tab-content div{
           display: none
        }
    </style>


    <section>

        <div class="academic-details">
            <div class="container">
                <div class="row" >
                    <div class="col-md-4">
                        <div class="aboutSidebar">
                            <ul>
                                <li class="tablinks" onclick="openTab(event, 'outline')"> Outline</li>
                                <li class="tablinks" onclick="openTab(event, 'admission')"> Admission Criteria</li>
                                <li class="tablinks" onclick="openTab(event, 'general')"> General Guideline</li>
                                <li class="tablinks" onclick="openTab(event, 'course')"> Course List</li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="fs-4 fw-bold text-primary">Faculty: {{ $info->fname }}</h1>
                                <h1 class="fs-6">Department: {{ $info->dname }}</h1>
                                <h1 class="fs-6 fw-bolder">Program: {{ $info->pcname }}</h1>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                <div  id="outline" class="tabcontent active">
                                    <p>{!! $info->outline !!}</p>
                                </div>
                                <div  id="admission" class="tabcontent">
                                    <p> {!! $info->admission_criteria !!}</p>
                                </div>
                                <div  id="general" class="tabcontent">
                                    <p> {!! $info->general_guidline !!}</p>
                                </div>
                                <div  id="course" class="tabcontent">
                                    <p>{!! $info->course_list !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

    <script>

function openTab(evt, tabName) {

        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
      }

    </script>

@endsection
