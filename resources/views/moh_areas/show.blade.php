@extends('layouts.admin')

@section('main-content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($mohArea->name) ? $mohArea->name : 'Moh Area' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('moh_areas.moh_area.destroy', $mohArea->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('moh_areas.moh_area.index') }}" class="btn btn-primary" title="Show All Moh Area">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('moh_areas.moh_area.create') }}" class="btn btn-success" title="Create New Moh Area">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('moh_areas.moh_area.edit', $mohArea->id ) }}" class="btn btn-primary" title="Edit Moh Area">
                        <span class="fa fa-edit" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Moh Area" onclick="return confirm(&quot;Click Ok to delete Moh Area.?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $mohArea->name }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $mohArea->updated_at }}</dd>
            <dt>Created At</dt>
            <dd>{{ $mohArea->created_at }}</dd>
            <dt>User</dt>
            <dd>{{ optional($mohArea->User)->name }}</dd>

        </dl>

    </div>
</div>

@endsection