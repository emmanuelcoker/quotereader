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
                                                <p>You have total {{$authors->count() ?? 'xx'}} authors.</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <ul class="nk-block-tools g-3">
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-primary" data-toggle="dropdown"><em class="icon ni ni-plus"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li data-toggle="modal" data-target="#authorForm"><a><span>New Author</span></a></li>
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
                                                        <h5 class="title">All Authors</h5>
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
                                                                            <li id="author-filter" class="active"><a>Author</a></li>
                                                                            <li id="category-filter"><a>About</a></li>
                                                                            <li id="quote-filter"><a>No of Quotes</a></li>
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
                                                            <input id="search_val" type="text" class="form-control form-control-sm border-transparent form-focus-none" placeholder="Quick search for Authors...">
                                                            
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
                                                                    <span>Author Name</span>
                                                                </span>
                                                                <span class="tb-tnx-date d-md-inline-block d-none">
                                                                    <span class="d-md-none">Desc</span>
                                                                    <span class="d-none d-md-block">
                                                                        <span>About</span>
                                                                    </span>
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
                                                    <tbody id="table-body">
                                                    	@foreach($authors as $author)
                                                        <tr class="tb-tnx-item">
                                                            <td class="tb-tnx-id">
                                                                <a href="#"><span>{{ $author->id}}</span></a>
                                                            </td>

                                                            <td class="tb-tnx-info">
                                                                <div class="tb-tnx-desc nameDiv">
                                                                    <span class="title author">{{ $author->author_name ?? 'Author Name'}}</span>
                                                                </div>
                                                                <div class="tb-tnx-date">
                                                                     <span class="date category">{{ $author->about ?? 'About'}}</span>
                                                                </div>
                                                            </td>
                                                            <td class="tb-tnx-amount is-alt">
                                                                <div class="tb-tnx-total">
                                                                    <span class="amount quote">{{ $author->quotes_count ?? 'quotes'}}</span>
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
                                                {{ $authors->links() }}<!-- .pagination -->
                                            </div><!-- .card-inner -->
                                        </div><!-- .card-inner-group -->
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
	</div>



<!-- New Author Modal Form -->
    <div class="modal fade" tabindex="-1" id="authorForm">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Author</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>

                <div class="modal-body">
                    <form id="newAuthorForm" class="form-validate is-alter">
                        @csrf

                        <input type="hidden" id="csrfToken" name="csrfToken" value="{{ csrf_token() }}">
                     
                        <div class="form-group">
                            <label class="form-label" for="author">Author</label>
                            <div class="form-control-wrap">
                                <input type="text" placeholder="New author name" class="form-control" name="author_name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="phone-no">About</label>
                            <div class="form-control-wrap">
                                <textarea id="about" name="about" required class="form-control textarea">
                                    
                                </textarea>
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



<script type="text/javascript" src="{{ asset('js/allquotes.js')}}">        
</script>

@endsection