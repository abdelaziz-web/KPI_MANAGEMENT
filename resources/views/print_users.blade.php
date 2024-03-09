@extends('layoutes.layout')
@section('title')
    employes
@endsection
@section('style')
<link   rel="stylesheet"    href="{{asset('css/style_connect.css')}}">  
@endsection
@section('content-1')
@if(session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif

@endsection
@section('content-2')
<div class="text-center">
<table class="table table-striped table-hover">
    <thead>
     <th>id</th>
     <th>Nom</th>
     <th>Prenom</th>
     <th>Status</th>
     <th>email</th>
     <th>Image</th>
     <th>Action</th>
    </thead>
    <tbody>

            @foreach ($employes as $employe)
            <tr>
                @if (session('employe')->id == $employe->id)
                   
                @else
                <td>{{$employe->id}}</td>
                <td>{{$employe->prenom_employe}}</td>
                <td>{{$employe->nom_employe}}</td>
                <td>{{$employe->STATUS}}</td>
                <td>{{$employe->email}}</td>
                <td>
                
            
                @if ($employe->photos == NULL)
     
           
            <img src="https://placehold.co/600x400/000000/FFFFFF/png" alt="Image" class="image-circulaire">  
           

                @else
     
           
            <img src="{{ asset('storage/'.$employe->photos) }}"  class="image-circulaire"  alt="Image">
           

            @endif
                
               
            </td>
            <td> 
                
                
                <div class="container text-center">
                    <div class="row">
                      <div class="col-sm-5 col-md-6 m-0"> 
                        
                               <a href="{{ route('employe.inserer',['id'=>$employe->id]) }}">
                                   <button type="button" class="btn btn-primary btn-sm">Modifier</button>
                                </a>
                       </div>
                       <div class="col-sm-5 col-md-6 w-50%"> 
                                <a href="{{ route('supprimer', ['id' => $employe->id]) }}">
                                   <button type="button" class="btn btn-danger btn-sm">supprimer</button>
                                </a>
                      </div>
                </div>
                </div>
{{--           
     <form action="" method="get">
                    @csrf
                            <input type="hidden" name="user_id" value={{$employe->id}}>
                            <button type="button" class="btn btn-primary btn-sm">Modifier</button>
               </form>

               <form action="" method="get">
                @csrf
                        <input type="hidden" name="user_id" value={{$employe->id}}>
                        <button type="button" class="btn btn-danger btn-sm">supprimer</button>
               </form>
    --}}
            </td>
            </tr>
            @endif
            @endforeach
           
        
    </tbody>
  </table>


  <div class="text-center my-3" >
    <div class=" my-3 "> 
   
 <button type="button" class="btn btn-success" form="myForm" > <a href="{{route('employe.inserer')}}"   style="color: aliceblue"> Ajouter_un_employé </a> </button>
  
     </div>
     </div>

</div>
@endsection