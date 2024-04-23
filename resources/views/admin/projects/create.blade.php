@extends('layouts/app')

@section('content')

<div class="container py-5">
    
    <h1 class="mb-5">Create</h1>

    <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title :</label>
            <input type="text" required class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}">
              @error('title')
              <div class="invalid-feedback">
                  {{$message}}
              </div>
              @enderror
        </div>   

        <div class="mb-3">
            <label for="description" class="form-label">Description :</label>
            <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{old('description')}}</textarea>
                @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
        </div>

        <div class="mb-3">
            <label for="thumb" class="form-label">Thumb image :</label>
            <input type="file" class="form-control @error('thumb') is-invalid @enderror" id="thumb" name="thumb">
                @error('thumb')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
        </div>

        <div class="mb-3">
            <label for="url" class="form-label">Link to the project :</label>
            <input type="text" required class="form-control @error('url') is-invalid @enderror" id="url" name="url" value="{{old('url')}}">
                @error('url')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
        </div>

        <div class="row">

            <div class="mb-3 col-6 ">
                <label for="programs" class="form-label">Programs used :</label>
                <input type="text" required class="form-control @error('programs') is-invalid @enderror" id="programs" name="programs" value="{{old('programs')}}">
                @error('programs')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            
            {{-- type --}}
            <div class="mb-3 col-6">
                <div class="form-label">Select a Type for your project :</div>
                <select class="form-select" name="type_id" id="type_id">
                    
                    <option value=""></option>

                    @foreach ($types as $type)
                    <option value="{{$type->id}}" {{$type->id == old('type_id') ? 'selected' : '' }}>{{$type->name}}</option>                       
                    @endforeach
                </select>
            </div>
        </div>
        


        <div class="col-12 d-flex justify-content-between ">
          <button type="submit" class="btn btn-primary">Add a new project</button>
          <a href="{{route('admin.projects.index')}}">Back to the list</a>
        </div>
    </form>

@endsection