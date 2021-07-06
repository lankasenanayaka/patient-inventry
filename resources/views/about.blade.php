@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('About') }}</h1>

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow mb-4">

                <div class="card-profile-image mt-4">
                    <img src="{{ asset('img/favicon.png') }}" class="rounded-circle" alt="user-image">
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12 mb-1">
                            <div class="text-center">
                                <h5 class="font-weight-bold">Yowun sadaham hamuwa</h5>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-1 text-center">
                            <a href="https://www.facebook.com/bosewana.mk/" target="_blank" class="btn btn-facebook btn-circle btn-lg"><i class="fab fa-facebook-f fa-fw"></i></a>
                        </div>                       
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="font-weight-bold">Patient data system</h5>
                            <p>Gift from Yowun Sadaham Hamuwa Kundasaale.</p>
                            
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="font-weight-bold">Special Credits</h5>
                            <ul>
                            <li> Pinwath Pawara swameenwahanse.</li>
                            <li>Mr. Lasantha Wickramasinghe (Entrepreneur, CEO Builtapps)</li>
                            <li>Mr. Isanka Maduwantha</li>
                                <li> Desh.</li>
                                <li> Shasheen.</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

@endsection
