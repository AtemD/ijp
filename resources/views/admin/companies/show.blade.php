@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white pl-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.company.index') }}">Companies</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$company->name}}</li>
        </ol>
    </nav>
</div>
@endsection