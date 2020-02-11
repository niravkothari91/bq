@extends('layout')

@section('title', 'Thank You')

@section('extra-css')

@endsection

@section('body-class', 'sticky-footer')

@section('content')

   <div class="thank-you-section light-text-color">
       @if(session()->has('success_message'))
           <h1>Thank you for <br> Your Order!</h1>
           <p>A confirmation email was sent</p>
       @elseif(session()->has('error_message'))
           <h1>Oops! There was an error..</h1>
           <p>{{session()->has('error_message')}}</p>
       @endif
       <div class="spacer"></div>
       <div>
           <a href="{{ route('landing-page') }}" class="button">Home Page</a>
       </div>
   </div>




@endsection
