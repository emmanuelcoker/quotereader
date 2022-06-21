@extends('layouts.admin')

@section('content')
	<div class="nk-content container-fluid">
		      <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between g-3">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Authors</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>You have total {{$categories->count() ?? 'xx'}} Categories.</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <ul class="nk-block-tools g-3">
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-primary" data-toggle="dropdown"><em class="icon ni ni-plus"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li data-toggle="modal" data-target="#categoryForm"><a><span>New Category</span></a></li>
                                                                
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="card card-bordered card-stretch">
                                        <div class="card-inner-group">
                                            <div class="card-inner">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h5 class="title">All Categories</h5>
                                                    </div>
                                                    <div class="card-tools mr-n1">
                                                        <ul class="btn-toolbar">
                                                            <li>
                                                                <a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a>
                                                            </li><!-- li -->
                                                            <li class="btn-toolbar-sep"></li><!-- li -->
                                                            <li>
                                                                <div class="dropdown">
                                                                    <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-toggle="dropdown">
                                                                        <em class="icon ni ni-setting"></em>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs"><ul class="link-check">
                                                                            <li><span>Filter</span></li>
                                                                            <li class="active" id="category-filter"><a>Category</a></li>
                                                                            <li id="quote-filter"><a>Quotes</a></li>
                                                                             <li class="d-none" id="author-filter"><a>Author</a></li>
                                                                        </ul>
                                                                        <ul class="link-check">
                                                                            <li><span>Order</span></li>
                                                                            <li class="active"><a href="#">DESC</a></li>
                                                                            <li id="asc"><a>ASC</a></li>
                                                                        </ul>
                                                                        </ul>
                                                                    </div>
                                                                </div><!-- .dropdown -->
                                                            </li><!-- li -->
                                                        </ul><!-- .btn-toolbar -->
                                                    </div><!-- card-tools -->
                                                    <div class="card-search search-wrap" data-search="search">
                                                        <div class="search-content">
                                                            <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                                            <input id="search_val" type="text" class="form-control form-control-sm border-transparent form-focus-none" placeholder="Quick search for Categories...">
                                                           
                                                        </div>
                                                    </div><!-- card-search -->
                                                </div><!-- .card-title-group -->
                                            </div><!-- .card-inner -->
                                            <div class="card-inner p-0">
                                                <table class="table table-tranx">
                                                    <thead>
                                                        <tr class="tb-tnx-head">
                                                            <th class="tb-tnx-id"><span class="">#</span></th>
                                                             <th class="tb-tnx-info">
                                                                <span class="tb-tnx-desc d-none d-sm-inline-block">
                                                                    <span>Category</span>
                                                                </span>
                                                            </th>
                                                            <th class="tb-tnx-amount is-alt">
                                                                <span class="tb-tnx-total">No. of Quotes</span>
                                                            </th>
                                                            <th class="tb-tnx-action">
                                                                <span>&nbsp;</span>
                                                            </th>
                                                        </tr><!-- tb-tnx-item -->
                                                    </thead>
                                                    <tbody>
                                                    	@foreach($categories as $category)
                                                        <tr class="tb-tnx-item">
                                                            <td class="tb-tnx-id">
                                                                <a href="#"><span>{{ $category->id}}</span></a>
                                                            </td>

                                                            <td class="tb-tnx-info">
                                                                <div class="tb-tnx-desc nameDiv">
                                                                    <span class="title category">{{ $category->category_name ?? 'Category Name'}}</span>
                                                                </div>
                                                            </td>
                                                            <td class="tb-tnx-amount is-alt">
                                                                <div class="tb-tnx-total">
                                                                    <span class="amount quote">{{ $category->quotes->count() ?? 'quotes'}}</span>
                                                                </div>
                                                            </td>
                                                            <td class="tb-tnx-action">
                                                                <div class="dropdown">
                                                                    <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                                        <ul class="link-list-plain">
                                                                            <li><a href="#">View quotes</a></li>
                                                                            <li><a href="#">Edit</a></li>
                                                                            <li><a href="#">Remove</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr><!-- tb-tnx-item -->
                                                        
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div><!-- .card-inner -->
                                            <div class="card-inner">
                                                {{ $categories->links() }}<!-- .pagination -->
                                            </div><!-- .card-inner -->
                                        </div><!-- .card-inner-group -->
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
	</div>


<!-- New Category Modal Form -->
    <div class="modal fade" tabindex="-1" id="categoryForm">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Category</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>

                <div class="modal-body">
                    <form id="newCategoryForm" class="form-validate is-alter">
                        @csrf

                        <input type="hidden" id="csrfToken" name="csrfToken" value="{{ csrf_token() }}">
                     
                        <div class="form-group">
                            <label class="form-label" for="category">Category</label>
                            <div class="form-control-wrap">
                            <input type="text" placeholder="New category name" class="form-control" name="category_name">

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="phone-no">Category Icon</label>
                            <div class="form-control-wrap">
                               <input type="file" placeholder="post an image" class="form-control" name="avatar">
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



<script type="text/javascript" src="{{ asset('js/allquotes.js') }}"></script>

@endsection