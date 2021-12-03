@extends('admin/layout')
@section('page_title','Banner')
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

<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Banner Image</h4>
                    <p class="card-description">  </p>
                    <form class="forms-sample" action="{{url('admin/banner/save')}}" method="post" enctype="multipart/form-data">
                      @csrf

                      <div class="form-group">
                        <!--label>Image upload</label-->
                        <input type="file" name="image" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      
                      @if($data[0]['id']>0)
                      <div class="form-group">
                      <div class="row">
                      <div class="col-12">

                       
                        <img src="{{asset('admin/bannerimage')}}/{{$data[0]['img']}}" height="100px" width="100px" alt="image">

                      </div>
                    </div>
                  </div>
                  @endif

                     <input type="hidden" name="id" value="{{$data[0]['id']}}">

                      <button type="submit" class="btn btn-gradient-primary mr-2">Save</button>
                      <a href="{{url('admin/dashboard')}}" class="btn btn-light">Cancel</a>
                    </form>
                  </div>
                </div>
              </div>

             

@endsection