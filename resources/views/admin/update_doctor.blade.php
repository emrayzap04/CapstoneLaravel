<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    
   <base href="/public">
    
   <style type="text/css">

    label
    {
      display: inline:block;
      
      width: 100px;
    }
    </style>

    @include('admin.css')

  </head>
      <div class="container-scroller">
 
      <!-- partial:partials/_sidebar.html -->
 
      @include('admin.sidebar')

      <!-- partial -->
     
       @include('admin.navbar')

        <!-- partial -->

        <div class="container-fluid page-body-wrapper">

        <div class="container" align="center" style="padding:100px;">

        @if(session()->has('message'))

         <div class="alert alert-success">

        <button type="button" class="close" data-dismiss="alert"></button>

         {{session()->get('message')}}

         </div>

        @endif
         
        <form action="{{url('editdoctor',$data->id)}}" method="POST" enctype="multipart/form-data">

        @csrf

        <div style="padding:15px;">
          <label>Doctor Name</label>
          <input type="text" style="color:black;" name="name" value="{{$data->name}}"></div>
          <div style="padding:15px;">
          <label>Phone</label>
          <input type="" style="color:black; padding:10px;" name="phone" value="{{$data->phone}}"></div>
          <div style="padding:15px;">
          <label>Speciality</label>
          <input type="text" style="color:black;" name="speciality" value="{{$data->speciality}}"></div>
          <div  style="padding:15px;">
          <label>Image</label>
          <img height="150" width="150" src="doctorimage/{{$data->image}}"></div>
          <div  style="padding:15px;">
          <label>Change Image</label>
          <input type="file" name="file"></div>
          <div  style="padding:15px;">
          <input type="submit" class="btn btn-primary">
          </div>

        </form>
        
        </div>

        </div>


    <!-- container-scroller -->
    <!-- plugins:js -->
    
    <!-- End custom js for this page -->
    </div>
  </body>
</html>