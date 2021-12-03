@extends('admin/layout')
@section('page_title','Room Services')
@section('roomservices','active')
@section('container')

<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Room Service DETAILS</h4>
                    <p class="card-description"> ADD/UPDATE Room Service</p>
                     @error('RoomService')
               <div class="alert alert-danger" role="alert"  style="height:25px;font-size:10px;display: flex;align-items: center;justify-content: center;">
                  {{$message}}
               </div>
               @enderror
                       <form action="{{url('admin/manage_roomservices_process')}}" method="post" enctype="multipart/form-data">
              	        @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="RoomService" value="{{$rsname}}" required>
                      </div>
                     
                      <input type="hidden" name="id" value="{{$id}}">
                      <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                      <a href="{{url('admin/roomservices')}}" class="btn btn-light">Cancel</a>
                    </form>
                  </div>
                </div>
              </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="{{asset('assets/js/file-upload.js')}}"></script>
@endsection