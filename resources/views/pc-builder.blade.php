@extends('layouts.front')
@section('content')


<style>
    .rotate-efect {
  /* Styles de base de l'image */
  width: 100px;
  height: 100px;
  transition: transform 0.5s ease-in-out;
}

.rotate-efect:hover {
  transform: rotate(360deg); /* Angle de rotation */
}
</style>



    <div class="container mt-4 text-center" style="background-color: #000000; padding:20px;">
        <h2 style="color: #BC221A">PC Builder  </h2>
        <h3 class="text-white typing-effect">Build It Better, Build It Yourself !</h3>

    </div>

    <div class="container mt-2 " style="margin-bottom: 200px;">
        <div class="row gap-2 d-flex flex-nowrap">
            <div class="col-md-8 " style=" padding:20px;">
                <div class="text-center">
                    <h4 style="color: #000000">Components : </h4>
                </div>
                <div class="row mt-3 gap-1 d-flex flex-nowrap">
                    <div class="col-md-3 text-center" style="background-color: #f5f5f5;padding:10px;" >
                       <a class="show-component" href="#"> <img class="rotate-efect" src="{{asset('/icons/icon-builder-01.png')}}" alt="sset"></a> 
                       <h5>CPU</h5>
                       <p class="selected-product">Choose..</p>
                    </div>
                    <div class="col-md-3 text-center" style="background-color: #f5f5f5;padding:10px;" >
                       <a href="#"> <img class="rotate-efect" src="{{asset('/icons/icon-builder-02.png')}}" alt="sset"></a> 
                       <h5>Cooling</h5>
                       <p class="selected-product">Choose..</p>
                    </div>
                    <div class="col-md-3 text-center" style="background-color: #f5f5f5;padding:10px;" >
                       <a href="#"> <img class="rotate-efect" src="{{asset('/icons/icon-builder-03.png')}}" alt="sset"></a> 
                       <h5>Motherboard</h5>
                       <p class="selected-product">Choose..</p>
                    </div>
                    <div class="col-md-3 text-center" style="background-color: #f5f5f5;padding:10px;" >
                       <a href="#"> <img class="rotate-efect" src="{{asset('/icons/icon-builder-04.png')}}" alt="sset"></a> 
                       <h5>Memory</h5>
                       <p class="selected-product">Choose..</p>
                    </div>
                </div>
                <div class="row mt-3 gap-1 d-flex flex-nowrap">
                    <div class="col-md-3 text-center" style="background-color: #f5f5f5;padding:10px;" >
                       <a href="#"> <img class="rotate-efect" src="{{asset('/icons/icon-builder-05.png')}}" alt="sset"></a> 
                       <h5>SSD</h5>
                       <p class="selected-product">Choose..</p>
                    </div>
                    <div class="col-md-3 text-center" style="background-color: #f5f5f5;padding:10px;" >
                       <a href="#"> <img class="rotate-efect" src="{{asset('/icons/icon-builder-06.png')}}" alt="sset"></a> 
                       <h5>HDD</h5>
                       <p class="selected-product">Choose..</p>
                    </div>
                    <div class="col-md-3 text-center" style="background-color: #f5f5f5;padding:10px;" >
                       <a href="#"> <img class="rotate-efect" src="{{asset('/icons/icon-builder-07.png')}}" alt="sset"></a> 
                       <h5>GPU</h5>
                       <p class="selected-product">Choose..</p>
                    </div>
                    <div class="col-md-3 text-center" style="background-color: #f5f5f5;padding:10px;" >
                       <a href="#"> <img class="rotate-efect" src="{{asset('/icons/icon-builder-08.png')}}" alt="sset"></a> 
                       <h5>Power supply</h5>
                       <p class="selected-product">Choose..</p>
                    </div>
                </div>
                <div class="row mt-3 gap-1 d-flex flex-nowrap">
                    <div class="col-md-3 text-center" style="background-color: #f5f5f5;padding:10px;" >
                       <a href="#"> <img class="rotate-efect" src="{{asset('/icons/icon-builder-09.png')}}" alt="sset"></a> 
                       <h5>Case</h5>
                       <p class="selected-product">Choose..</p>
                    </div>
                    <div class="col-md-3 text-center" style="background-color: #f5f5f5;padding:10px;" >
                       <a href="#"> <img class="rotate-efect" src="{{asset('/icons/icon-builder-10.png')}}" alt="sset"></a> 
                       <h5>Fans</h5>
                       <p class="selected-product">Choose..</p>
                    </div>
                    <div class="col-md-3 text-center" style="background-color: #f5f5f5;padding:10px;" >
                       <a href="#"> <img class="rotate-efect" src="{{asset('/icons/icon-builder-11.png')}}" alt="sset"></a> 
                       <h5>Sound card</h5>
                       <p class="selected-product">Choose..</p>
                    </div>
                    <div class="col-md-3 text-center" style="background-color: #f5f5f5;padding:10px;" >
                       <a href="#"> <img class="rotate-efect" src="{{asset('/icons/icon-builder-12.png')}}" alt="sset"></a> 
                       <h5>Network card</h5>
                       <p class="selected-product">Choose..</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4" style=" padding:20px;" >
               <div class="text-center">
                     <h4 style="color: #000000">Overview : </h4>
               </div>

               <div class="mt-3" style="background-color: #f5f5f5; padding:20px;">
                  <table class="table">
                     <tbody>
                       <tr>
                         <td style="font-weight: 800">CPU</td>
                         <td>AMD RYZEN 5600G</td>
                         <td><span class="badge rounded-pill bg-primary">13.000Da</span></td>
                       </tr>
                       <tr>
                         <td style="font-weight: 800">Cooling</td>
                         <td>Cooling</td>
                         <td><span class="badge rounded-pill bg-primary">13.000Da</span></td>
                       </tr>
                       <tr>
                         <td style="font-weight: 800">Motherboard</td>
                         <td>AMD RYZEN 5600G</td>
                         <td><span class="badge rounded-pill bg-primary">13.000Da</span></td>
                       </tr>
                      
                     </tbody>
                  </table>

                  <table class="table table-dark table-striped">
                     <tbody>
                       <tr>
                         <td style="font-weight: 800">TOTAL Config :</td>
                         <td>13.000Da</td>
                       </tr>
                     </tbody>
                  </table>
               </div>


               <div class="mt-3 d-flex justify-content-center " style="background-color: #f5f5f5; padding:20px;">
                  <button type="button" class="btn btn-danger btn-lg">Order it now !</button>
               </div>
            </div>
        </div>
    </div>



    

    <div id="section-modal-builder">

    </div>

    
@endsection

@push('pc-builder-scripts')
<script>
   $(".show-component").click(function() {
    $.ajax({
        type: "GET",
        url: "/show-component" , // Remplacez par l'URL de votre fichier HTML
        success: function(data) {
            $('#section-modal-builder').html(data);
            	

            new DataTable('#example', {
            columnDefs: [
               {
                     orderable: false,
                     render: DataTable.render.select(),
                     targets: 0
               }
            ],
           
            select: {
               style: 'os',
               selector: 'td:first-child'
            }
         });

            $("#modal-pc-builder").modal('show'); // Insérez le contenu HTML dans le div
        }
    });
   });  




</script> 




    
@endpush
