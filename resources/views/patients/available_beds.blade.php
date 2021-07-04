@extends('layouts.admin')

@section('main-content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Bed Category Details</h4>
            </div>

        </div>
        
        @if(count($patient_details) == 0)
            <div class="panel-body text-center">
                <h4>No Data.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">

       

            <div class="table-responsive">
            
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>{{ $aval==1? 'Available beds':'Occupied beds' }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($patient_details as $patient_detail)
                        <tr>
                            <td>{{ utf8_decode($patient_detail['name']) }}</td>
                            <td>{{ $aval==1?$patient_detail['available']:$patient_detail['active'] }}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        @endif
    </div>
@endsection