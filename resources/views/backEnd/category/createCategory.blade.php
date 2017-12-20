@extends('backEnd.master')
@section('page-title', 'Category')
@section('page-heading', 'Manage Category')
@section('content')

<section class="content">
  <div class="col-xs-12">
    <form action="{{route('category.store')}}" method="post">
      {{csrf_field()}}
      <div class="form-group">
        <label >Category Name</label>
        <input name="category_name" class="form-control" type="text" placeholder="Enter Your Category Here">
      </div>
      <div class="form-group">
        <select class="form-control" name="category_publication_status">
          <option>Status</option>
          <option value="1">Publish</option>
          <option value="0">Unpublish</option>
        </select>
      </div>
      <div class="form-group">
        <input type="submit" value="submit" class="btn btn-primary btn-block">
      </div>
    </form>
  </div>
</section>

@endsection
