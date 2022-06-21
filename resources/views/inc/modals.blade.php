    <!--New Quote Modal Form -->
    <div class="modal fade" tabindex="-1" id="quoteForm">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Quote</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>

                <div class="modal-body">
                    <form id="newQuoteForm" class="form-validate is-alter">
                        @csrf

                        <input type="hidden" id="csrfToken" name="csrfToken" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label class="form-label" for="full-name">Author Name</label>
                            <div class="form-control-wrap">
                                <select id="author" name="author_id" required class="form-control">
                                    <option value="0"> - Select Author Name - </option>
                                    @foreach($quotes->unique('author_id') as $author)
                                        <option value="{{ $author->author_id }}">{{ $author->authors->author_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="email-address">Category</label>
                            <div class="form-control-wrap">
                                <select id="category" name="category_id" class="form-control" required>
                                    <option value="0"> - Select Category Name - </option>
                                    @foreach($quotes->unique('category_id') as $category)
                                        <option value="{{ $category->category_id }}">{{ $category->categories->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="phone-no">Content</label>
                            <div class="form-control-wrap">
                                <textarea id="desc" name="content" required class="form-control textarea">
                                    
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="pay-amount">Schedule Date</label>
                            <div class="form-group row">
                   
                <div id="dateBox" class="col-12 d-flex justify-content-center align-items-center">
                          
                    <input id="dd" type="text" style="width:50px; height:auto;" placeholder="DD" name="dd" class="form-control" maxlength="2" minlength="1" required>
                    
                    <span class="text-secondary mx-2" style="font-size: 30px;">/</span>
                    
                    <input id="mm" type="text" style="width:50px; height:auto;" placeholder="MM" name="mm" class="form-control" maxlength="2" minlength="1" required>
                    
                    <span class="text-secondary mx-2" style="font-size: 30px;">/</span>
                    
                    <input id="yyyy" type="text" minlength="4" maxlength="4" style="width:70px; height:auto;" placeholder="YYYY" name="yyyy" class="form-control" required>
                    
                    <input type="hidden" name="dob" id="dob">
                </div>
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



