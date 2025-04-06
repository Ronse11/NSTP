@extends('layout.master_layout')

@section('body')

<div class="{{$notif ? "content-wrapper main-section" : "content-wrapper"}} {{$pending ? "content-wrapper main-section": ''}} {{$comment ? "content-wrapper main-section": ''}}">

    @if($notif || $pending || $comment) 

    <div class=" congrats-container">
        <div class="congrats-content">
            <div class="banner-container">
                <div class="logo-container">
                    <img src="{{ asset('template/dist/img/cpsulogo.png') }}" class="cpsuLogo" alt="User Image">
                </div>
                <div class="separator"></div>
                <div class="banner-text">
                    <h4 class="cpsu-text">CENTRAL PHILIPPINES STATE UNIVERSITY</h4>
                    <h4 class="address-text">KABANKALAN, NEGROS OCCIDENTAL</h4>
                </div>
            </div>
            @if($pending || $comment)
                @if($comment)
                    <div class="banner-body text-center">
                        <h2 class="font-weight-bold text-danger mt-3">NSTP Program Application: Declined</h2>
                        <p class="lead mt-3">{{$comment->comment}}</p>    
                        {{-- <form action="{{ route('readComment', $comment->student_id) }}" method="GET">
                            @csrf
                            <div class="accept-btn">
                                <button>Back to Home</button>
                            </div>
                        </form> --}}
                                                                            {{-- <form action="{{ route('declineApplicant', $datastudlts->student_id) }}" method="POST">
                                                        @csrf
                                                        <button class="btn btn-danger">Decline</button>
                                                    </form> --}}
                    </div>
                @else
                    <div class="banner-body text-center">
                        <h2 class="font-weight-bold text-primary mt-3">NSTP Program Application: Processing in Progress</h2>
                        <p class="lead mt-3">Your submission has been successfully received.  
                        Our team is reviewing your request, and we will notify you once the process is complete.  
                        Thank you for your patience.</p>    
                    </div>
                @endif
            @else
                <div class="banner-body">
                    <h1>Subject: NSTP Program Acceptance Notification</h1>
                    <h3>Hi {{$notif->fname}} {{$notif->mname}} {{$notif->lname}}!</h3>
                    <p>We are pleased to inform you that you have been successfully accepted into your chosen NSTP Program: <span>{{$notif->category}}</span> for School <span>{{$notif->school_year}}</span>.</p>
                    <p>Congratulations, and we look forward to your participation!</p>
                </div>
                <div class="accept-btn">
                    <button>Accept</button>
                </div>
            @endif
        </div>
    </div>
    
    @else

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Choose Your Subject</h1>
                </div>
                <div class="col-sm-6 d-flex justify-content-end">

                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @foreach($cat as $datacat)
                        <div class="col">
                            <div class="card-container">
                                <img src="{{ asset('assets/img/gallery/' . $datacat->image) }}" alt="Dist Photo 1">
                                <div class="overlay">
                                    <div class="hover-overlay"></div>
                                    <h1>{{ $datacat->category_name }}</h1>
                                    <div class="btn-container">
                                        <a href="{{ route('fillupstudentRead', ['id' => encrypt($datacat->id)]) }}" class="btn-select">Select</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        
    @endif
    
</div>

@endsection