

    
            <div class=" text-center text-black ">

        
                @if (Session::has('error'))
                    <div class="row" style="text-align: left">
                      
                        <div class="col-md-12" >
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>ERROR : </strong> {{ Session::get('error') }}
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                        </div>
                    </div>
                @endif

                @if (Session::has('message'))
                    <div class="row" style="text-align: left">
                    
                        <div class="col-md-12" >
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>SUCCESS : </strong> {{ Session::get('message') }}
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($errors->any())

                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="color:white">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>
       


