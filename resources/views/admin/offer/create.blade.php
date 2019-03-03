@extends('admin.layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Create Offer</h1>
          </div><!-- /.col -->
      <div class="col-sm-6">
            <a href="{{route('offer.index')}}" type="button" class="float-right btn btn-success"><i class="fa fa-folder"></i>View Offer</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              @include('_includes.messages')
              <div class="card-body">
                <h5 class="card-title">Add Offer Details</h5>
        <div class="table-responsive">
    <form action="{{route('offer.store')}}" enctype="multipart/form-data" method="post">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="name">Offer Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Offer name">
      </div>
      {{-- <div class="form-group">
        <label for="caption">Slider Caption</label>
        <input type="text" class="form-control" name="caption" id="caption" placeholder="Enter slider caption">
      </div> --}}
      <div class="form-group">
        <label for="offer_image">Upload Offer Photo</label>
        <input type="file" name="offer_image" value="" />
      </div>
      {{-- <div class="form-group">
        <label for="link_url">Link Url</label>
        <input type="text" class="form-control" name="link_url" id="link_url" placeholder="Enter link url">
      </div> --}}

    <button type="submit" class="btn btn-success">Submit</button>

    </form>
      </div>
              </div>
            </div>


          </div>
          <!-- /.col-md-6 -->

          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection
