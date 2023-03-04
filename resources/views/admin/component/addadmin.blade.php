@extends('admin.master')

@section('content')



<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Admin</h4>
                  <p class="card-description">
                    Basic form layout
                  </p>
                    <form method="post" action="{{route('admin.doregister')}}" class="forms-sample">
                    @csrf
                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" name="email" class="form-control mb-2" id="exampleInputEmail1" placeholder="Email">

                      @error('email')

                        <span class="text-danger"> {{$message}} </span>

                      @enderror
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control mb-2" name="password" id="exampleInputPassword1" placeholder="Password">

                       @error('password')

                        <span class="text-danger"> {{$message}} </span>

                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Confirm Password</label>
                      <input type="password" name="cpassword" class="form-control mb-2" id="exampleInputPassword1" placeholder="Confirm Password">

                      @error('cpassword')

                        <span class="text-danger"> {{$message}} </span>

                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="exampleSelectGender">Admin Role</label>
                        <select class="form-control mb-2" name="status" id="exampleSelectGender">
                          <option value="1">Super Admin</option>
                          <option selected value="2">Editor</option>
                          <option value="3">Seo</option>
                          <option value="4">Manager</option>
                        </select>

                      @error('status')

                        <span class="text-danger"> {{$message}} </span>

                      @enderror
                      </div>
                  
                    
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>

            <script type="text/javascript">

              @if(Session::get('key') == 200)

              Swal.fire(
              'Registered Sussfully',
              'You clicked the button!',
              'success'
          )

              @endif
              
              

            </script>

      @endsection