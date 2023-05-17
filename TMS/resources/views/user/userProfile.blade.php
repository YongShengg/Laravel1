@extends('layout')
@section('title', 'Home')
@section('content')
    <div class="container rounded bg-white mt-5 mb-5">
        @auth
        <form method="POST" action="{{ route('userProfile.post',auth()->id()) }}" enctype="multipart/form-data" class="needs-validation" role="form" novalidate>
        @csrf
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">{{auth()->user()->name}}</span><span class="text-black-50">{{auth()->user()->email}}</span><span> </span></div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Edit Profile</button></div>
                </div>
                
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" placeholder="{{auth()->user()->name}}" name="name"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" placeholder="{{auth()->user()->email}}" value=""></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="{{auth()->user()->phone}}" name="phone"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">.</h4>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Address Line 1</label><input type="text" class="form-control" placeholder="enter address line 1" value=""></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Address Line 2</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Postcode</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" placeholder="state"></div>
                            <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endauth
    </div>
@endsection