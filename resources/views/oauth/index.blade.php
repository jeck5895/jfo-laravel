@extends('layouts.app')

@section('title'){{ 'API - Dashboard' }}@stop

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 mb-2">
                <passport-clients></passport-clients>
            </div>  
            <div class="col-xs-12 col-sm-12 col-md-8 mb-2">
                <passport-authorized-clients></passport-authorized-clients>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8">
                <passport-personal-access-tokens></passport-personal-access-tokens>
            </div>
        </div>
    </div>
    <!-- <v-content>
      <v-container fluid fill-height>
        <v-layout justify-center align-center>
            <passport-clients></passport-clients>
            <passport-authorized-clients></passport-authorized-clients>
            <passport-personal-access-tokens></passport-personal-access-tokens>
        </v-layout>
     </v-container>
    </v-content> -->
@endsection