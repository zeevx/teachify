@extends('layouts.admin-main')
@section('title')
    Teachify - Complaints
@endsection


@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">All Complaints @include('messenger.unread-count')</li>
                                <li class="breadcrumb-item"><a href="{{ url('messages/create') }}">Create New Complaint</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">New Complain</h3>
                    </div>
                    <div>
                        <form action="{{ route('messages.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="col-md-6">
                                <!-- Subject Form Input -->
                                <div class="form-group">
                                    <label class="control-label">Subject</label>
                                    <input type="text" class="form-control" name="subject" placeholder="Subject"
                                           value="{{ old('subject') }}">
                                </div>

                                <!-- Message Form Input -->
                                <div class="form-group">
                                    <label class="control-label">Message</label>
                                    <textarea name="message" class="form-control">{{ old('message') }}</textarea>
                                </div>

                                @if($users->count() > 0)
                                    <div class="checkbox">
                                        @foreach($users as $user)
                                            <label title="{{ $user->name }}"><input type="checkbox" name="recipients[]"
                                                                                    value="{{ $user->id }}">{!!$user->name!!}</label>
                                        @endforeach
                                    </div>
                            @endif

                            <!-- Submit Form Input -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary form-control">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <footer class="footer pt-0">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6">
                    <div class="copyright text-center  text-lg-left  text-muted">
                        &copy; 2020 <a href="{{ route('home') }}" class="font-weight-bold ml-1" target="_blank">Teachify</a> Powered by <img src="{{ url('') }}/CAPIFLEX.png" class="img-fluid" width="100px">
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
