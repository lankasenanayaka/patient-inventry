@extends('layouts.admin')

@section('main-content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Bed' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('beds.bed.destroy', $bed->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('beds.bed.index') }}" class="btn btn-primary" title="Show All Bed">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('beds.bed.create') }}" class="btn btn-success" title="Create New Bed">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('beds.bed.edit', $bed->id ) }}" class="btn btn-primary" title="Edit Bed">
                        <span class="fa fa-edit" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Bed" onclick="return confirm(&quot;Click Ok to delete Bed.?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Bed Name</dt>
            <dd>{{ $bed->bed_name }}</dd>
            <dt>Created At</dt>
            <dd>{{ $bed->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $bed->updated_at }}</dd>
            <dt>User</dt>
            <dd>{{ optional($bed->User)->name }}</dd>

        </dl>

    </div>
</div>

@endsection