<div class="text-center" id="skills">
    <div id="content-keahlian">
        <div class="col-12">
            <div class="row">
                <div class="col-md-4 ">
                    <button type="button" class="btn btn-primary btnFrontend" data-toggle="modal" data-target="#wp">
                        Web Programer
                    </button>
                </div>
                <div class="col-md-4 m-auto pt-1 pb-1">
                    {{-- <button type="button" id="graphic-desain" class="btn btn-primary btnFrontend fa fa-tencent-weibo" alt="Graphic Desain"></button> --}}
                    <button type="button" class="btn btn-primary btnFrontend" data-toggle="modal" data-target="#gd">
                        Graphic Desain
                    </button>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary btnFrontend" data-toggle="modal" data-target="#mp">
                        Mobail Programer
                    </button>
                    {{-- <button type="button" id="mobail-programer" class="btn btn-warning bg-gradient-warning btnFrontend fa fa-mobile-phone "></button> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid text-center no-gutters">
    <div class="row no-gutters justify-content-center">
        <div class="col-6 " id="image-keahlian">
                <img class=" wow animated fadeInLeft h-100 w-100 img-square-wrapper"src="{{ url('frontend/images/keahlian.PNG') }}"> </img>
        </div>
        <div class="col-6 col-center wow animated fadeInRight">

            <div class="container-fluid ">
                <div class="row m-auto justify-content-center">
                  <p>My Portofolio</p>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-md-12 col-lg-6 p-1">
                    <div class="card">
                      <img src="..." class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12  col-md-12 col-lg-6 p-1">
                    <div class="card" >
                      <img src="..." class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                   <div class="col-sm-12 col-md-12 col-lg-6 p-1">
                    <div class="card">
                      <img src="..." class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12  col-md-12 col-lg-6 p-1">
                    <div class="card" >
                      <img src="..." class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="wp" tabindex="-1" role="dialog" aria-labelledby="wpTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="overflow-x:auto">
        <div  class="styleChart" id="obj">
            <div>My Skils</div>
            <canvas id="myChart" ></canvas>
        </div>
      </div>
      <div class="modal-footer">
        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> --}}
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="gd" tabindex="-1" role="dialog" aria-labelledby="gdTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="overflow-x:auto">
        <div  class="styleChart" id="obj">
            <div>My Skils</div>
            <canvas id="myChartGd" ></canvas>
        </div>
      </div>
      <div class="modal-footer">
        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> --}}
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="mp" tabindex="-1" role="dialog" aria-labelledby="mpTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="overflow-x:auto">
        <div  class="styleChart" id="obj">
            <div>My Skils</div>
            <canvas id="myChartmp" ></canvas>
        </div>
      </div>
      <div class="modal-footer">
        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> --}}
      </div>
    </div>
  </div>
</div>

{{-- <button type="button" id="web-programer" class="btn btn-primary btnFrontend  fa fa-code" alt="Web Programer"></button> --}}
<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#wp">
  Launch demo modal
</button> --}}

  {{-- <div  class="styleChart" id="obj">
                    <div>My Skils</div>
                    <canvas id="myChart" ></canvas>
                </div> --}}
                {{-- <div  class="styleChart" id="obj1">
                    tester1
                </div> --}}
                {{-- <div  class="styleChart" id="obj2">
                    tester2
                </div> --}}


                {{-- <img class="h-100 w-100 img-square-wrapper" src={{ url('frontend/images/banner1.PNG') }} alt="Card image cap"></img> --}}