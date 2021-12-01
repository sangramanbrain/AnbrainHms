@extends('admin/layout')
@section('page_title','Dashboard')
@section('container')


   

  @if(session()->has('message'))
  <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                      <span class="badge badge-pill badge-success"></span>
                      {{session('message')}}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
  </div>
  @endif

  
            <div class="row d-none" id="proBanner">
              <div class="col-12">
                <span class="d-flex align-items-center purchase-popup">
                  <p>Get tons of UI components, Plugins, multiple layouts, 20+ sample pages, and more!</p>
                  <a href="https://www.bootstrapdash.com/product/purple-bootstrap-admin-template?utm_source=organic&amp;utm_medium=banner&amp;utm_campaign=free-preview" target="_blank" class="btn download-button purchase-button ml-auto">Upgrade To Pro</a>
                  <i class="mdi mdi-close" id="bannerClose"></i>
                </span>
              </div>
            </div>
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
              
            </div>
            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image">
                    <h4 class="font-weight-normal mb-3">Total Rooms <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">15,00,000</h2>
                    <!--h6 class="card-text">Increased by 60%</h6-->
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image">
                    <h4 class="font-weight-normal mb-3">Total Bookings <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">4,56,334</h2>
                    <!--h6 class="card-text">Decreased by 10%</h6-->
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image">
                    <h4 class="font-weight-normal mb-3">Total Customers <i class="mdi mdi-diamond mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">9,55,741</h2>
                    <!--h6 class="card-text">Increased by 5%</h6-->
                  </div>
                </div>
              </div>
            </div>
          
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Recent Bookings</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Customer </th>
                            <th> Members </th>
                            <th> Room No </th>
                            <th> Check In </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <img src="{{asset('assets/images/faces/face1.jpg')}}" class="mr-2" alt="image"> David Grey
                            </td>
                            <td> 3 </td>
                            
                             <td> 45 </td>
                            <td> Dec 5, 2017 </td>
                          </tr>
                          <tr>
                            <td>
                              <img src="{{asset('assets/images/faces/face2.jpg')}}" class="mr-2" alt="image"> Stella Johnson
                            </td>
                            <td> 5 </td>
                            
                            <td> 46 </td>
                            <td> Dec 12, 2017 </td>
                          </tr>
                          <tr>
                            <td>
                              <img src="{{asset('assets/images/faces/face3.jpg')}}" class="mr-2" alt="image"> Marina Michel
                            </td>
                            <td> 7 </td>
                           
                            <td> 47 </td>
                            <td> Dec 16, 2017 </td>
                          </tr>
                          <tr>
                            <td>
                              <img src="{{asset('assets/images/faces/face4.jpg')}}" class="mr-2" alt="image"> John Doe
                            </td>
                            <td> 9 </td>
                           
                             <td> 48 </td>
                            <td> Dec 3, 2017 </td>                       
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
          
         
    
@endsection