@extends('layouts.adminlayout.admin_design')
@section('content')
<div class="slim-mainpanel">
  <div class="container">
    <div class="slim-pageheader">
      <ol class="breadcrumb slim-breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
      </ol>
      <h6 class="slim-pagetitle">Dashboard</h6>
    </div>
    <!-- slim-pageheader -->
    <div class="section-wrapper ">
      <div class="row">
        <div class="col-sm-6">
          <label class="section-title">Custom Style Error Message</label>
          <p class="mg-b-20 mg-sm-b-40">A demo for using custom styled messages for error container.</p>
          <form id="selectForm2" class="parsley-style-1" action="#">
            
            <div class="form-group">
              <label>Firstname: <span class="tx-danger">*</span></label>
              <input type="text" name="firstname" class="form-control " placeholder="Enter firstname" data-parsley-class-handler="#fnWrapper" required>
              </div><!-- form-group -->
              <div class="form-group">
                <label>Lastname: <span class="tx-danger">*</span></label>
                <input type="text" name="lastname" class="form-control " placeholder="Enter lastname" data-parsley-class-handler="#lnWrapper" required>
                </div><!-- form-group -->
                
                
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Validate Form</button>
                </div>
              </form>
            </div></div>
            </div><!-- section-wrapper -->
          </div>
          <!-- container -->
          
          @endsection