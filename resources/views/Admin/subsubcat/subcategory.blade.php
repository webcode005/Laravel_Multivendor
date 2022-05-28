@extends('admin.layouts.layouts')
@section('content')


          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">

            <div class="row" style="margin-top:40px;">
                                <br><br>
                            
                                @if ($message = Session::get('success-message'))
                                <div class="col-md-12">                                                       
                                    <div class="alert alert-dark alert-dismissible" role="alert">
                                      {{ $message }}
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>                                        
                                    </div>
                                </div>
                                        
                                    @endif
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <strong>Opps!</strong> Something went wrong<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                
                            </div>
              
              <!-- Responsive Datatable -->
              <div class="card">
                <h5 class="card-header">{{$title}} Tables <a href="/admin/add-edit-subcat" class="btn btn-success btn-md" style="float: right;">Add Sub Category</a></h5>
                <div class="card-datatable table-responsive">
                  <table class="dt-responsive table border-top">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>SubCategory</th>
                        <th>SubCat</th>
                        <th>Url</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $ik='1';?>
                        @foreach($subcategories as $category)

                            <tr>
                                <td>{{ $ik++;}}</td>
                                <td>{{ $category['category_name']}}</td>
                                <td>{{ $category['subcatename']}}</td>
                                <td>{{ $category['name']}}</td>
                                <td>{{ $category['url']}}</td>
                                
                                <td>@if($category['status'] == '1')
                                  <a href="javascript:void(0)" class="updateSubCatStatus" id="category-{{$category['id']}}" category_id="{{$category['id']}}"> <span class="badge bg-success"  id="status" status="Active"> Active </span></a> 
                                  @else <a class="updateSubCatStatus" id="category-{{$category['id']}}" category_id="{{$category['id']}}" href="javascript:void(0)"> <span class="badge bg-danger" id="status" status="InActive"> InActive </span> </a> @endif </td>
                                
                                <td><a class="btn btn-sm btn-primary" href="{{url('admin/add-edit-subcat')}}/{{ $category['id']}}">Edit</a> | <a class="btn btn-sm btn-danger deletesubcat" title="Sub Subcategories" href="{{url('admin/delete-subcat')}}/{{ $category['id']}}">Delete</a></td>
                            </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Responsive Datatable -->
            </div>
            <!-- / Content -->

           
@endsection