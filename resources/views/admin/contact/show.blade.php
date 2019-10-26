@extends('layouts.app')

@section('title','Contact')

@push('css')
@endpush

@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">

              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">{{$contacts->subject}}</h4>
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col-md-12">
                            <strong>Name: {{$contacts->name}}</strong> <br>
                            <b>Email: {{$contacts->email}}</b> <br>
                            <strong>Message: </strong> <br>
                              <p>{{ $contacts->message }}</p>
                        </div>
                    </div>
                <a href="{{route('contact.index')}}" class="btn btn-danger">Back</a>
                <div class="clearfix">

                </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
@endsection

@push('scripts')

@endpush