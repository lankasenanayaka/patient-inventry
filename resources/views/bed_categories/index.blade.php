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
                <h4 class="mt-5 mb-5">Bed Categories</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('bed_categories.bed_category.create') }}" class="btn btn-success" title="Create New Bed Category">
                <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($bedCategories) == 0)
            <div class="panel-body text-center">
                <h4>No Bed Categories Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Desc</th>
                            <!-- <th>User</th> -->

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($bedCategories as $bedCategory)
                        <tr>
                            <td>{{ utf8_decode($bedCategory->name) }}</td>
                            <td>{{ $bedCategory->desc }}</td>
                            <!-- <td>{{ optional($bedCategory->user)->name }}</td> -->

                            <td>

                                <form method="POST" action="{!! route('bed_categories.bed_category.destroy', $bedCategory->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('bed_categories.bed_category.show', $bedCategory->id ) }}" class="btn btn-info" title="Show Bed Category">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('bed_categories.bed_category.edit', $bedCategory->id ) }}" class="btn btn-primary" title="Edit Bed Category">
                                            <span class="fa fa-edit" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Bed Category" onclick="return confirm(&quot;Click Ok to delete Bed Category.&quot;)">
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
            {!! $bedCategories->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection