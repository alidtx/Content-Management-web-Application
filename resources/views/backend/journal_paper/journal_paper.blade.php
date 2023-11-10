@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0 text-dark">Journal Paper</h1> --}}
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Journal</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h5 class="m-0 text-dark float-left">Journal Paper</h5>
                            <a href="{{ route('news.journal_paper.add') }}" class="btn btn-primary btn-sm float-right"><i
                                    class="fas fa-stream"></i> Add Journal Paper</a>
                        </div>
                        <div class="card-body">
                            <table id="dataTable" class="table table-sm table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Paper Title</th>
                                        <th>Journal For</th>
                                        <th>Chief Patron</th>
                                        <th>Editor</th>
                                        <th>ISSN</th>
                                        <th>Research Area</th>
                                        <th>Volume</th>
                                        <th>Issue</th>
                                        <th>Date</th>
                                        <th>Attachment 1</th>
                                        <th>Attachment 2</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($journalPapers as $journalPaper)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ @$journalPaper->paper_title }}</td>
                                            <td>
                                                @php
                                                    if(@$journalPaper->journal_for == 1){
                                                        echo $journalPaper->department->name;
                                                    }
                                                    elseif(@$journalPaper->journal_for == 2){
                                                        echo 'CHSR';
                                                    }
                                                    elseif(@$journalPaper->journal_for == 3){
                                                        echo 'Bangabandhu Chair';
                                                    }
                                                    elseif(@$journalPaper->journal_for == 4){
                                                        echo 'IQAC';
                                                    }
                                                @endphp
                                            </td>
                                            <td>{{ @$journalPaper->authors }}</td>
                                            <td>{{ @$journalPaper->editor }}</td>
                                            <td>{{ @$journalPaper->issn }}</td>
                                            <td>{{ @$journalPaper->research_area }}</td>
                                            <td>{{ @$journalPaper->volume }}</td>
                                            <td>{{ @$journalPaper->issue }}</td>
                                            <td>{{ @$journalPaper->date }}</td>
                                            <td>
                                                @if (@$journalPaper->attachment1)
                                                    <a href="{{ asset('public/upload/journal/' . @$journalPaper->attachment1) }}"
                                                        download="">Download</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if (@$journalPaper->attachment2)
                                                    <a href="{{ asset('public/upload/journal/' . @$journalPaper->attachment2) }}"
                                                        download="">Download</a>
                                                @endif
                                            </td>
                                            <td><a href="{{ route('news.journal_paper.edit', @$journalPaper->id) }}"
                                                    class="btn btn-primary btn-flat btn-sm edit" data-type="image"
                                                    data-id=""><i class="fas fa-edit"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
@endsection
