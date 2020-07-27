
@extends('layouts.app')

@section('style')
    <style>
        
                        
.ibox-content {
    background-color: #FFFFFF;
    color: inherit;
    padding: 15px 20px 20px 20px;
    border-color: #E7EAEC;
    border-image: none;
    border-style: solid solid none;
    border-width: 1px 0px;
}

.search-form {
    margin-top: 10px;
}

.search-result h3 {
    margin-bottom: 0;
    color: #1E0FBE;
}

.search-result .search-link {
    color: #006621;
}

.search-result p {
    font-size: 12px;
    margin-top: 5px;
}

.hr-line-dashed {
    border-top: 1px dashed #E7EAEC;
    color: #ffffff;
    background-color: #ffffff;
    height: 1px;
    margin: 20px 0;
}

h2 {
    font-size: 24px;
    font-weight: 100;
}

                    
    </style>
@endsection

@section('nav')
@include('navigation.user')
@endsection
@section('content')
<div class="container bootstrap snippet mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <h3>
                        160 results found for: <span class="text-navy">"Bootdey"</span>
                    </h3>
                    <small>Request time  (0.23 seconds)</small>
        
                    <div class="search-form">
                        <form class="md-form " action="#" method="get">
                            <div class="input-group">
                                <input type="text" placeholder="Search..." name="search" class="form-control input-sm "><span style="font-size:24px;" class="text-primary"><i class="fas fa-search"></i></span>
                                <!-- <div class="input-group-btn">
                                    <a class="btn btn-primary p-3" type="submit">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </div> -->
                            </div>
                        </form>
                    </div>

                    <div class="hr-line-dashed"></div>
                    <div class="search-result">
                        <h3><a href="#">Bootdey</a></h3>
                        <a href="#" class="search-link">www.bootdey.com</a>
                        <p>

                        </p>
                    </div>

                    <div class="hr-line-dashed"></div>
                    <div class="search-result">
                        <h3><a href="{{url('/laundry/profile')}}">Wash 'N Dry</a></h3>
                        <a href="#" class="search-link">https://bootdey.com/</a>
                        <p>
                          Bootdey is a gallery of free snippets resources templates and utilities for bootstrap css hmtl js framework. Codes for developers and web designers
                        </p>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="search-result">
                        <h3><a href="#">Bootdey | Facebook</a></h3>
                        <a href="#" class="search-link">https://www.facebook.com/bootdey</a>
                        <p>
                           Bootdey is a gallery of free snippets resources templates and utilities for bootstrap css hmtl js framework. Codes for developers and web designers
                        </p>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="search-result">
                        <h3><a href="#">Bootdey | Twitter</a></h3>
                        <a href="#" class="search-link">www.twitter.com/bootdey</a>
                        <p>
                            Bootdey is a gallery of free snippets resources templates and utilities for bootstrap css hmtl js framework. Codes for developers and web designers
                        </p>
                    </div>
                    <div class="hr-line-dashed"></div>
                    
                    <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">4</a></li>
    <li class="page-item"><a class="page-link" href="#">5</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
