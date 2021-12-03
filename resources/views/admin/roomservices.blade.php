@extends('admin/layout')
@section('page_title','RoomServices')
@section('Room Services','active')
@section('container')
<style type="text/css">
   td{
      background-color: #fff;
   }
</style>
 <div class="row col-12" style="margin:0 !important;padding:0 !important">
         
            <div class="card col-12" style="padding:20px">
              
                <h1>Room Services</h1>
                <br>
                <a href="{{url('admin/manage_roomservices')}}">
                <button type="button" class="btn btn-success">
                 Add Service
                </button> 
               </a>


@if(session()->has('message'))
  <div class="sufee-alert alert with-close alert-success alert-dismissible fade show" style="margin-top:10px;width:300px" >
                      <span class="badge badge-pill badge-success"></span>
                      {{session('message')}}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
  </div>
@endif
               
             
           
       
    
       <div class="card-body table-responsive p-0" style="padding:20px !important">
                <table id="example" class="display nowrap">
                  <thead>
                       <tr>
                           <th>SId</th>
                           <th>Services</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                  </thead>
                  <tbody>
                         @php
                        $count=1;
                        @endphp
                        @foreach($data as $list)
                        <tr>
                           <td>{{$count}}</td>
                          
                           <td>{{$list->rsname}}</td>
                          
                           <td>
                               @if($list->rstatus==1)
                                  <a href="{{url('admin/roomservices/status/0')}}/{{$list->id}}"><button type="button" class="btn btn-primary">Active</button>
                                  </a> 
                               @elseif($list->rstatus==0)
                                 <a href="{{url('admin/roomservices/status/1')}}/{{$list->id}}"><button type="button" class="btn btn-warning">Deactive</button>
                                  </a>
                               @endif
                          </td> 
                           <td>
                              <a href="{{url('admin/manage_roomservices/')}}/{{$list->id}}"class="btn bg-success">
                               <i class="fas fa-edit" style="color:#fff"></i> Edit
                              </a>   
                              <a href="{{url('admin/roomservices/delete/')}}/{{$list->id}}"class="btn bg-danger">
                               <i class="fas fa-trash-alt" style="color:#fff"></i> Delete
                              </a>                  
                           </td>  
                        </tr>  
                           @php
                           $count+=1
                           @endphp
                           @endforeach       
           
           
         
            
                     </tbody>
       
                   </table>
                    </div>
              </div>
            </div>
              <!-- /.card-body -->
          
        <!-- /.row -->
        
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
    
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            
        ]
    } );
} );
 

</script>
@endsection