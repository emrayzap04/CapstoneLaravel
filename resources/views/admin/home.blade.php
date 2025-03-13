<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
</head>
<body style="background-color:white ;">
    <div class="container-scroller w-full">
        @include('admin.sidebar')
        @include('admin.navbar')

        <div class="main-panel w-full">
            <div class="content-wrapper flex flex-col " style="background-color: #434;">
                <!-- <h1 style="background-color:yellow; text-align:center; font-size: 35px; margin:10px;">IN DEVELOPMENT</h1> -->
       <div class=" justify-center p-6  flex-wrap gap-4 md:flex-col md:items-center">
    <button id="toggleUsers" class="btn btn-primary  md:w-1/2" style="height: auto; width: 250px; font-size: 35px; font-weight: 400;  background-color: #AD1457;  padding: 30px; margin: 15px;">
    Users <br> <span style="display: grid; font-weight: 400;" class="pt-4">{{ count($users ?? []) }}</span>
    </button>
    <button id="toggleUsers" class="btn btn-primary  md:w-1/2" style="height: auto; width: 250px; font-size: 35px; font-weight:400;  background-color: #AD1457;  padding: 30px; margin: 15px;">
        Appointment <br> <span style="display: block; font-weight: 400;" class="pt-4">↓</span>
    </button>
    <button id="toggleUsers" class="btn btn-primary  md:w-1/2" style="height: auto; width: 250px; font-size: 35px; font-weight: 400;  background-color: #AD1457;  padding: 30px; margin: 15px;">
        Availability <br> <span style="display: block; font-weight: 400;" class="pt-4">↓</span>
    </button>
    <button id="toggleUsers" class="btn btn-primary  md:w-1/2" style="height: auto; width: 250px; font-size: 35px; font-weight: 400;  background-color: #AD1457;  padding: 30px; margin: 15px;">
        Equipment <br> <span style="display: block; font-weight: 400;" class="pt-4">↓</span>
    </button>
    </div> 
    <div id="userTable" style="margin-top: 20px;">
        <h3 style="margin-left: 12px;">User's Information</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Student ID</th>
                    <th>Year Level</th> 
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td style="color:#778899;">{{ $user->name }}</td>
                        <td style="color:#778899;">{{ $user->email }}</td>
                        <td style="color:#778899;">{{ $user->student_id }}</td>
                        <td style="color:#778899;">{{ $user->year_level }}</td>
                        <td>
                        <button class="btn btn-primary viewUser" 
                         data-name="{{ $user->name}}" 
                         data-email="{{ $user->email}}" 
                         data-phone="{{ $user->phone}}" 
                         data-address="{{ $user->address}}" 
                         data-student-id="{{ $user->student_id}}" 
                         data-education="{{ ucfirst($user->education_level)}}"
                         data-year="{{ $user->year_level}}"
                         data-bs-toggle="modal" data-bs-target="#viewUserModal">
                         View
                        </button>
                        <a href="{{ url('/editUser', $user->id) }}" class="btn btn-warning">Edit</a>
                        <a class="btn btn-danger" onclick="return confirm('are you sure to delete this')" href="{{url('deleteUser',$user->id)}}">Delete</a>
                        </td>
                    </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @include('admin.script')

        <script>
    document.getElementById('toggleUsers').addEventListener('click', function() {
        let userTable = document.getElementById('userTable');
        let userCount = this.getAttribute('data-user-count')

        if (userTable.style.display === 'none') {
            userTable.style.display = 'block';
            this.innerHTML = 'Users <br> <span style="display: grid; font-weight: 400;" class="pt-4">{{ count($users ?? []) }}</span>';
        } else {
            userTable.style.display = 'none';
            this.innerHTML = `Users <br> <span style="display: grid; font-weight: 400;" class="pt-4">{{ count($users ?? []) }}</span>`;

        }
    });
    </script>

<div class="modal fade" id="viewUserModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">User Info</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Name:</strong> <span id="modalUserName"></span></p>
                <p><strong>Email:</strong> <span id="modalUserEmail"></span></p>
                <p><strong>Phone:</strong> <span id="modalUserPhone"></span></p>
                <p><strong>Address:</strong> <span id="modalUserAddress"></span></p>
                <p><strong>Student ID:</strong> <span id="modalStudentId"></span></p>
                <p><strong>Education Level:</strong> <span id="modalEducation"></span></p>
                <p><strong>Year Level:</strong> <span id="modalYear"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

    </div>
</body>
</html>
