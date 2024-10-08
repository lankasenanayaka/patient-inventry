@extends('layouts.admin')

@section('main-content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Beds</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('beds.bed.create') }}" class="btn btn-success" title="Create New Bed">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($beds) == 0)
            <div class="panel-body text-center">
                <h4>No Beds Available.</h4>
            </div>
        @else

        <div class="panel-body text-center">
            <h4>Total beds : {{ $widget['beds_all'] }} &nbsp;&nbsp; Occupied beds : {{ $widget['occupied_beds'] }} &nbsp;&nbsp; Vacancies : {{ $widget['available_beds'] }}</h4>
        </div>
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Bed Name</th>
                            <th>Category</th>
                            <!-- <th>User</th> -->

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($beds as $bed)
                        <tr>
                            <td>{{ $bed->bed_name }}</td>
                            <td>{{ utf8_decode(optional($bed->Category)->name) }}</td>
                            <!-- <td>{{ optional($bed->User)->name }}</td> -->

                            <td>

                                <form method="POST" action="{!! route('beds.bed.destroy', $bed->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('beds.bed.show', $bed->id ) }}" class="btn btn-info" title="Show Bed">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('beds.bed.edit', $bed->id ) }}" class="btn btn-primary" title="Edit Bed">
                                            <span class="fa fa-edit" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Bed" onclick="return confirm(&quot;Click Ok to delete Bed.&quot;)">
                                            <span class="fa fa-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $beds->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection