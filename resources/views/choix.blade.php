@extends('layoutes.layout')
@section('title')
    donné
@endsection
@section('style')
<link   rel="stylesheet"    href="{{asset('css/style_connect.css')}}">  
@endsection
@section('content-1')

  
@endsection
@section('content-2')
   


   <div class="container overflow-hidden bg-secondary-subtle w-25 p-5 rounded text-center my-3">
    <div class="row gy-5">
      <button type="button" class="btn btn-success">
        <a href="{{ route('objectiv_2') }}" style="color: aliceblue">
          Taux
        </a>
     </button>
        </div>
        </div>

        <div class="container overflow-hidden bg-secondary-subtle w-25 p-5 rounded text-center my-3" >
            <div class="row gy-5">
              <button type="button" class="btn btn-success">
                <a href="{{ route('objectiv_1') }}" style="color: aliceblue">
                  Reel
                </a>
             </button>
                </div>
                </div>


@endsection
