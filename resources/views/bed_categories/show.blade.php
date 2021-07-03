@extends('layouts.admin')

@section('main-content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($bedCategory->name) ? utf8_decode($bedCategory->name) : 'Bed Category' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('bed_categories.bed_category.destroy', $bedCategory->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('bed_categories.bed_category.index') }}" class="btn btn-primary" title="Show All Bed Category">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('bed_categories.bed_category.create') }}" class="btn btn-success" title="Create New Bed Category">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('bed_categories.bed_category.edit', $bedCategory->id ) }}" class="btn btn-primary" title="Edit Bed Category">
                        <span class="fa fa-edit" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Bed Category" onclick="return confirm(&quot;Click Ok to delete Bed Category.?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ utf8_decode($bedCategory->name) }}</dd>
            <dt>Desc</dt>
            <dd>{{ $bedCategory->desc }}</dd>
            <dt>Created At</dt>
            <dd>{{ $bedCategory->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $bedCategory->updated_at }}</dd>
            <dt>User</dt>
            <dd>{{ optional($bedCategory->user)->name }}</dd>
            

        </dl>

    </div>
</div>

@endsection