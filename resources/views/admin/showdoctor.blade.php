<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    
    @include('admin.css')

  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
            </div>
          </div>
        </div>
      </div>  
      <!-- partial:partials/_sidebar.html -->
 
      @include('admin.sidebar')

      <!-- partial -->
     
       @include('admin.navbar')

        <!-- partial -->
      <div class="container-fluid page-body-wrapper">


        <div class="container" align="center" style="padding-top:100px;">
    <h1 style="background-color:yellow; font-size: 35px; margin:10px;">IN DEVELOPMENT</h1>
        <table>
            <tr style="background-color:#00D9A5" align="center">
                <th style="padding:10px;">Doctor Name</th>
                <th style="padding:10px;">Phone</th>
                <th style="padding:10px;">Speciality</th>
                <th style="padding:10px;">Image</th>
                <th style="padding:10px;">Remove</th>
                <th style="padding:10px;">Update</th>
            
            </tr>

            @foreach($data as $doctor)
              <tr style="background-color:violet;" align="center">
                <td>{{$doctor->name}}</td>
                <td>{{$doctor->phone}}</td>
                <td>{{$doctor->speciality}}</td>
                <td><img height="100" width="100" src="doctorimage/{{$doctor->image}}"></td>

                <td><a onclick="return confirm('are you sure to remove this')" class="btn btn-danger" href="{{url('removedoctor',$doctor->id)}}">Remove</a></td>
                <td><a class="btn btn-primary" href="{{url('updatedoctor',$doctor->id)}}">Update</a></td>

              </tr>
            @endforeach
            
           </table>

        </div>

     </div>
     

    <!-- container-scroller -->
    <!-- plugins:js -->
    

    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>