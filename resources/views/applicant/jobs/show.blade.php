@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white pl-0">
            <li class="breadcrumb-item"><a href="{{ route('applicant.home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('applicant.home') }}">Jobs</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$job->title}}</li>
        </ol>
    </nav>
</div>

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">{{$job->title}}</h1>
        <h3>{{$job->company->name}}</h3>
        <p class="lead text-muted">{{$job->description}}</p>
        <p>
        <form method="POST" action="{{ route('applicant.job-application.store', $job->id) }}">
            @csrf

            <input type="hidden" name="job_id" value="{{$job->id}}">
            <button type="submit" class="btn btn-primary">
                Apply To Job
            </button>
        </form>
        </p>
    </div>
</section>
@endsection