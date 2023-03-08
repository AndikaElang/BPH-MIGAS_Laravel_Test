<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Students page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
    crossorigin="anonymous">
  </head>
  <body>
    <div class="container pt-4"> 
        <div class="row"> 
            <div class="col-md-12">
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
                </div>
                @endif
            </div>
            <div class="col-md-12">
                <form class="row g-3" action="{{ url('students') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-auto">
                        <label class="visually-hidden">Excel</label>
                        <input type="file" class="form-control" name="excel_file">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb">Upload excel file</button>
                    </div>
                    @error('excel_file')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </form>

                @if(Session::has('import_errors'))
                    @foreach(Session::get('import_errors') as $failure)
                    <div class="alert alert-danger" role="alert">
                        {{$failure->errors()[0]}}
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="row"> 
            <div class="col-md-12">
                <h2>Accepted Students List</h2>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">NIM</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Selected Courses</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($students))
                        @foreach($students as $student)
                        <tr>
                            <th scope="row">{{$student->nim}}</th>
                            <td>{{$student->first_name}}</td>
                            <td>{{$student->last_name}}</td>
                            <td>{{$student->gender}}</td>
                            <td>{{$student->selected_courses}}</td>
                            <td>{{$student->status}}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="3">No data found</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" 
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" 
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  </body>
</html>