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
                <h4 class="mt-5 mb-5">Moh Areas</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('moh_areas.moh_area.create') }}" class="btn btn-success" title="Create New Moh Area">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($mohAreas) == 0)
            <div class="panel-body text-center">
                <h4>No Moh Areas Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <!-- <th>User</th> -->

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($mohAreas as $mohArea)
                        <tr>
                            <td>{{ $mohArea->name }}</td>
                            <!-- <td>{{ optional($mohArea->User)->name }}</td> -->

                            <td>

                                <form method="POST" action="{!! route('moh_areas.moh_area.destroy', $mohArea->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('moh_areas.moh_area.show', $mohArea->id ) }}" class="btn btn-info" title="Show Moh Area">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('moh_areas.moh_area.edit', $mohArea->id ) }}" class="btn btn-primary" title="Edit Moh Area">
                                            <span class="fa fa-edit" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Moh Area" onclick="return confirm(&quot;Click Ok to delete Moh Area.&quot;)">
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
            {!! $mohAreas->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection