<nav class="navbar bg-body-tertiary  navnav">

    <div class="container-fluid  row-cols-md-3">

       <div class="col row ">
       
         <x-foto1  :employe="$employe" />
            
          <div class="col-sm-9 bg-light p-3 border ">
           <div  class="m-2"  >
             Nom :   {{$employe->nom_employe}}  
              </div>     
        
         <div  class="m-2"  >
             Prenom :  {{$employe->prenom_employe}}
          </div>  

         </div>    
         

         
         
           {{-- <img src="images\ORMVA.png"  width="100%"   alt="">--}} 
       </div>

       <div class="col  ">  
       <h4><p class="text-center">  SERVICE :  </p></h4>
       <h5>  <p class="text-center"> {{$service->designation_service	}}  </p> </h5> 
       </div>  

        <x-foto2/>
      </nav> 
  


      <div class="text-center my-3" >
     <div class=" my-3 "> 
     @if (session('employe')->admin ===1)
      <button type="button" class="btn btn-success" form="myForm" > <a href="{{route('admin')}}"   style="color: aliceblue"> Tant_qu'administrateur </a> </button>
      @endif
      </div>
      </div>