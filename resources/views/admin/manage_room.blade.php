@extends('admin/layout')
@section('page_title','Room Details')
@section('room','active')
@section('container')

<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">ROOM DETAILS</h4>
                    <p class="card-description"> ADD/UPDATE ROOM Details </p>
                     @error('CategoryName')
               <div class="alert alert-danger" role="alert"  style="height:25px;font-size:10px;display: flex;align-items: center;justify-content: center;">
                  {{$message}}
               </div>
               @enderror
                       <form action="{{url('admin/manage_room_process')}}" method="post" enctype="multipart/form-data">
              	        @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Room No</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Room Name/No" name="RoomNo" value="{{$roomno}}" required>
                      </div>
                        <div class="form-group">
                        <label for="exampleInputName1">Select Category</label>
                       <select class="form-control" required="true" name="rc">
                        <option selected="" disabled="">Select Category</option>
                         @foreach($data as $list)
                         @if($roomc==$list->id)
                         <option value="{{$list->id}}" selected="true">{{$list->categoryname}}</option>
                         @else
                             <option value="{{$list->id}}">{{$list->categoryname}}</option>
                         @endif
                         @endforeach
                       </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Description</label>
                       <textarea class="form-control" name="rdesc">{{$rdesc}}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Price</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Price Per Day" name="price" value="{{$price}}" required>
                      </div>
                      <div class="form-group">
                        <label>Room Images</label>
                        <input type="file" name="image[]" class="file-upload-default" multiple >
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Room Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-12">
                        <?php
                           for($i=0;$i<count($rimg);$i++){
                            if($i==0){
                              continue;
                            }
                            ?>
                             <img src="{{asset('roomimages')}}/{{$rimg[$i]}}" height="100px" width="100px" style="margin:10PX">
                            <?php
                           }
                        ?>
                      </div>
                    </div>
                        <div class="form-group row">
                          @foreach($services as $list)
                          @if(in_array($list->id, $ser))

                            <div class="form-check" style="margin:10px">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="services[]" value="{{$list->id}}" checked="true"> {{$list->rsname}} <i class="input-helper"></i></label>
                            </div>
                          @else
                           <div class="form-check" style="margin:10px">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="services[]" value="{{$list->id}}"> {{$list->rsname}} <i class="input-helper"></i></label>
                            </div>


                          @endif
                          
                           @endforeach
                        </div>
                      <input type="hidden" name="id" value="{{$id}}">
                      <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                      <a href="{{url('admin/room')}}" class="btn btn-light">Cancel</a>
                    </form>
                  </div>
                </div>
              </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="{{asset('assets/js/file-upload.js')}}"></script>

@endsection