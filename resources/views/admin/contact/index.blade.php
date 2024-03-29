@extends('layouts.app')

@section('title','Contact')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endpush

@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">

              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Contact Message</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="table" style="width:100%" cellspacing="0">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                          E-mail
                        </th>
                        <th>
                          Subject
                        </th>
                        <th>
                          Sent At
                        </th>
                        <th>
                          Action
                        </th>
                      </thead>
                      <tbody>
                          @foreach ($contacts as $key=>$contact)
                              <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $contact->name}}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->subject }}</td>
                                <td>{{ $contact->created_at }}</td>
                                <td>
                                <a href="{{route('contact.show',$contact->id)}}" class="btn btn-info btn-sm">
                                    <i class="material-icons"> details </i>
                                  </a>

                                <form id="delete-form-{{ $contact->id }}" action="{{route('contact.destroy',$contact->id)}}" style="display:none;" method="POST">
                                      @csrf
                                      @method('DELETE')

                                    </form>

                                    <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure you want to delete this?')){
                                      event.preventDefault();
                                      document.getElementById('delete-form-{{ $contact->id }}').submit();
                                    }else{
                                      event.preventDefault();
                                    }"> <i class="material-icons"> delete </i> 
                                    </button>
                                 
                                </td>
                              </tr>
                          @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @if ($errors->any())
            @foreach ($errors->all() as $error)
                <script>
                    toastr.error('{{ $error }}');
                </script>
            @endforeach
        @endif

    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>

    {!! Toastr::message() !!}
@endpush