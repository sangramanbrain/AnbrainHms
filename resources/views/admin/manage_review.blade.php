@extends('admin/layout')
@section('page_title','Review Details')
@section('iron','active')
@section('container')

<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Review DETAILS</h4>
                    <p class="card-description"> ADD/UPDATE Review Details </p>
                     @error('CategoryName')
               <div class="alert alert-danger" role="alert"  style="height:25px;font-size:10px;display: flex;align-items: center;justify-content: center;">
                  {{$message}}
               </div>
               @enderror
                       <form action="{{url('admin/manage_reviews_process')}}" method="post" enctype="multipart/form-data">
              	        @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">UserName</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="uname" value="{{$uname}}" required>
                      </div>
                       @if($id!='')
                       <img src="{{asset('review')}}/{{$uimg}}" height="50px" width="70px" style="margin:10PX">
                          <div class="form-group">
                        <label>User Images</label>
                        <input type="file" name="uimg" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled="" placeholder="Update User Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      @else
                       <div class="form-group">
                        <label>User Images</label>
                        <input type="file" name="uimg" class="file-upload-default" required="true">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload User Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                       @endif
                      
                      <div class="form-group">
                        <label for="exampleInputName1">Room No</label>
                        <select class="form-control" name="roomid">
                          <option selected="" disabled="">Select Room Number</option>
                          @foreach($room as $list)
                          @if($roomid==$list->id)
                          <option value="{{$list->id}}" selected>{{$list->roomno}}</option>
                          @else
                           <option value="{{$list->id}}">{{$list->roomno}}</option>
                          @endif
                          @endforeach
                        </select>
                      </div>
                       <div class="form-group">
                        <label for="exampleInputName1">Review</label>
                        <textarea class="form-control" name="ureview" placeholder="Your Review ....">{{$ureview}}</textarea>
                      </div>
                     
                      <input type="hidden" name="id" value="{{$id}}">
                      <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                      <a href="{{url('admin/category')}}" class="btn btn-light">Cancel</a>
                    </form>
                  </div>
                </div>
              </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="{{asset('assets/js/file-upload.js')}}"></script>
@endsection