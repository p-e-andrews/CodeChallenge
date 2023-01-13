@extends('layouts.app')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Processes</h1>
    <div>
    <a style="margin: 19px;" href="{{ route('processes.create')}}" class="btn btn-primary">New process</a>
    </div>    
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
                <a href="{{ route('processes.edit',$process->id)}}" class="btn btn-primary">Edit</a>
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
</div>
@endsection