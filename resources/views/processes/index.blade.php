<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  h1 {
    text-align: center;
    color: #269abc;
  }
  </style>
</head>
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Processes</h1>   
    <div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div> 
  <table class="table table-striped">
    <thead>
        <tr>
          <td>UUID</td>
          <td>Name</td>
          <td>Description</td>
          <td>Code</td>
          <td>Status</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($processes as $process)
        <tr>
            <td>{{$process->id}}</td>
            <td>{{$process->name}}</td>
            <td>{{$process->description}}</td>
            <td>{{$process->code}}</td>
            <td>{{$process->status}}</td>
            <td>
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#editModal">Edit Process</button>
            </td>
            <td>
                <form action="{{ route('processes.destroy', $process->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <div>
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#createModal">Add Process</button>
  </div> 
<div>
</div>


<!-- Modal -->
<div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Process</h4>
      </div>
      <div class="modal-body">
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('processes.update', $process->id) }}">
            @method('PATCH') 
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value={{ $process->name }} />
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" name="description" value={{ $process->description }} />
            </div>
            <div class="form-group">
                <label for="code">Code:</label>
                <input type="text" class="form-control" name="code" value={{ $process->code }} />
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" class="form-control" name="status" value={{ $process->status }} />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
  <div class="modal fade" id="createModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Process</h4>
        </div>
        <div class="modal-body">
        <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('processes.store') }}">
          @csrf

          <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label for="description">Description:</label>
              <input type="text" class="form-control" name="description"/>
          </div>
          <div class="form-group">
              <label for="code">Code:</label>
              <input type="text" class="form-control" name="code"/>
          </div>
          <div class="form-group">
              <label for="status">Status</label>
              <input type="text" class="form-control" name="status"/>
          </div>                         
          <button type="submit" class="btn btn-primary-outline">Add process</button>
      </form>
  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
