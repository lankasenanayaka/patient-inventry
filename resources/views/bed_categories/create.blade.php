@extends('layouts.admin')

@section('main-content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">
            
            <span class="pull-left">
                <h4 class="mt-5 mb-5">Create New Bed Category</h4>
            </span>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('bed_categories.bed_category.index') }}" class="btn btn-primary" title="Show All Bed Category">
                    <span class="fa fa-th-list" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        <div class="panel-body">
        
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('bed_categories.bed_category.store') }}" accept-charset="UTF-8" id="create_bed_category_form" name="create_bed_category_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('bed_categories.form', [
                                        'bedCategory' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Add">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection


