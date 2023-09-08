@extends('layouts.app')
@section('content')

<div class="container">
                <div class="card" >
                <div class="card-header">   
                        <div class="text-center">
                            <h1>Editar Usuario</h1>
                        </div>
                    </div>
                    <div class="card-body">
                <form action="{{ route('usuario.update', $users->id)  }}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="mb-3 mt-3">
      <label for="nombre" class="fxorm-label">Nombre Usuario:</label>
      <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{ $users->name }}"> 
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Correo Electrónico:</label>
      <input type="email" name="email" placeholder="email" class="form-control mb-2" value="{{ $users->email }}">
    </div>
    <button class="btn btn-warning btn-block" type="submit">Editar</button>
    <a type="button" class="btn btn-dark" href="{{ url()->previous() }}">Volver</a>
  </form>
  </div> 
</div>
</div>


@endsection

<!--  



<div class="container">
        <div class=" text-center">

            <h1 >Editar Usuario</h1>
                
            
        </div>
    <div class="row ">
      <div class="col-lg-7 mx-auto">
        <div class="card mt-2 mx-auto p-4 bg-light">
            <div class="card-body bg-light">
       
            <div class = "container">
            <form action="{{ route('usuario.update', $users->id)  }}" method="POST">
            <input type="hidden" name="_method" value="PUT">

            <div class="controls">

            <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_email">Email *</label>
                            <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_need">Please specify your need *</label>
                            <select id="form_need" name="need" class="form-control" required="required" data-error="Please specify your need.">
                                <option value="" selected disabled>--Select Your Issue--</option>
                                <option >Request Invoice for order</option>
                                <option >Request order status</option>
                                <option >Haven't received cashback yet</option>
                                <option >Other</option>
                            </select>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_email">Email *</label>
                            <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_need">Please specify your need *</label>
                            <select id="form_need" name="need" class="form-control" required="required" data-error="Please specify your need.">
                                <option value="" selected disabled>--Select Your Issue--</option>
                                <option >Request Invoice for order</option>
                                <option >Request order status</option>
                                <option >Haven't received cashback yet</option>
                                <option >Other</option>
                            </select>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="form_message">Message *</label>
                            <textarea id="form_message" name="message" class="form-control" placeholder="Write your message here." rows="4" required="required" data-error="Please, leave us a message."></textarea
                                >
                            </div>

                        </div>


                    <div class="col-md-12">
                        
                        <input type="submit" class="btn btn-success btn-send  pt-2 btn-block
                            " value="Send Message" >
                    
                </div>
          
                </div>


        </div>
         </form>
        </div>
            </div>


    </div>


    </div>
 

</div>
</div>
-->