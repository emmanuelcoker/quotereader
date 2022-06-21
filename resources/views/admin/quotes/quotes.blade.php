@extends('layouts.admin')

@section('content')
	<div class="nk-content container-fluid">
		      <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between g-3">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Quotes</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>You have total {{ $quotes->count() ?? 'xx'}} quotes.</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <ul class="nk-block-tools g-3">
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-primary" data-toggle="dropdown"><em class="icon ni ni-plus"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li data-toggle="modal" data-target="#quoteForm"><a><span>Add Quote</span></a></li>
                                                                <li data-toggle="modal" data-target="#categoryForm"><a><span>Add Category</span></a></li>
                                                                <li data-toggle="modal" data-target="#authorForm"><a><span>Add Author</span></a></li>
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
                                                <div class="card-title-group" style="position: relative;">
                                                    <div class="card-title">
                                                        <h5 class="title">All Quotes</h5>
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
                                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                                        <ul class="link-check">
                                                                            <li><span>Filter</span></li>
                                                                            <li id="quote-filter" class="active"><a>Quotes</a></li>
                                                                            <li id="category-filter"><a>Category</a></li>
                                                                             <li id="author-filter"><a>Author</a></li>
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
                                                            <input id="search_val" type="text" class="form-control form-control-sm border-transparent form-focus-none" placeholder="Quick search for Quotes...">
                                                           
                                                        </div>
                                                    </div><!-- card-search -->
                                                        
                                                    </div>
                                                </div><!-- .card-title-group -->
                                            </div><!-- .card-inner -->
                                            <div class="card-inner p-0">
                                                <table class="table table-tranx">
                                                    <thead>
                                                        <tr class="tb-tnx-head">
                                                            <th class="tb-tnx-id"><span class="">#</span></th>
                                                             <th class="tb-tnx-info">
                                                                <span class="tb-tnx-desc d-none d-sm-inline-block">
                                                                    <span>Quote</span>
                                                                </span>
                                                                <span class="tb-tnx-date d-md-inline-block d-none">
                                                                    <span class="d-md-none">Category</span>
                                                                    <span class="d-none d-md-block">
                                                                        <span>Category</span>
                                                                    </span>
                                                                </span>
                                                            </th>

                                                            <th class="tb-tnx-date d-md-inline-block d-none">
                                                                    <span class="d-md-none">Author</span>
                                                                    <span class="d-none d-md-block">
                                                                        <span>Author</span>
                                                                    </span>
                                                            </th>
                                                            <th class="tb-tnx-action">
                                                                <span>&nbsp;</span>
                                                            </th>
                                                        </tr><!-- tb-tnx-item -->
                                                    </thead>
                                                    
                                                    <tbody id="table-body">
                                                    	@foreach($quotes as $quote)
                                                        <tr class="tb-tnx-item">
                                                            <td class="tb-tnx-id">
                                                                <a href="#"><span>{{ $quote->id}}</span></a>
                                                            </td>

                                                            <td class="tb-tnx-info">
                                                                <div class="tb-tnx-desc nameDiv">
                                                                    <span class="title quote">{{ $quote->content ?? 'Quote content'}}</span>
                                                                </div>
                                                                <div class="tb-tnx-date">
                                                                     <span class="date category">{{ $quote->categories->category_name ?? 'Category'}}</span>
                                                                </div>
                                                            </td>
                                                            <td class="tb-tnx-amount is-alt">
                                                                <div class="tb-tnx-total">
                                                                    <span class="amount author">{{ $quote->authors->author_name ?? 'Author Name'}}</span>
                                                                </div>
                                                                <div class="tb-tnx-status">
                                                                    <span class="badge badge-dot badge-success">active</span>
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
                                                <!-- .pagination -->
                                            </div><!-- .card-inner -->
                                        </div><!-- .card-inner-group -->
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
	</div>

@include('inc.modals')

<script type="text/javascript" src="{{ asset('js/allquotes.js') }}"></script>

@endsection