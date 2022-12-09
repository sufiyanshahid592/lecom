@extends('user/template/main')
@section('title', 'Home')
@section('content')
<main class="main">
    <div class="page-header mt-30 mb-75">
        <div class="container">
            <div class="archive-header">
                <div class="row align-items-center">
                    <div class="col-xl-12 text-center">
                        <h1 class="mb-15">Blogs</h1>
                        <div class="breadcrumb">
                            <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                            <span></span> Blog & News
                        </div>
                    </div>
                    <!-- <div class="col-xl-9 text-end d-none d-xl-block">
                        <ul class="tags-list">
                            <li class="hover-up">
                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Shopping</a>
                            </li>
                            <li class="hover-up active">
                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Recips</a>
                            </li>
                            <li class="hover-up">
                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Kitchen</a>
                            </li>
                            <li class="hover-up">
                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>News</a>
                            </li>
                            <li class="hover-up mr-0">
                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Food</a>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="page-content mb-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                    <div class="shop-product-fillter mb-50">
                        <div class="totall-product">
                            <h2>
                                <img class="w-36px mr-10" src="assets/imgs/theme/icons/category-1.svg" alt="" />
                                Recips Articles
                            </h2>
                        </div>
                        <div class="sort-by-product-area">
                            <div class="sort-by-cover mr-10">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps"></i>Show:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="active" href="#">50</a></li>
                                        <li><a href="#">100</a></li>
                                        <li><a href="#">150</a></li>
                                        <li><a href="#">200</a></li>
                                        <li><a href="#">All</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sort-by-cover">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps-sort"></i>Sort:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span>Featured <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="active" href="#">Featured</a></li>
                                        <li><a href="#">Newest</a></li>
                                        <li><a href="#">Most comments</a></li>
                                        <li><a href="#">Release Date</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="loop-grid loop-big">
                        <div class="row">
                            <?php foreach($get_all_blogs as $key=>$value){ ?>
                            <article class="first-post mb-30 hover-up animated" style="visibility: visible">
                                <div class="position-relative overflow-hidden">
                                    <span class="top-left-icon"><i class="fi-rs-headphones"></i></span>
                                    <div class="post-thumb border-radius-15">
                                        <a href="<?php echo url("blog/".$value->blog_slug); ?>">
                                            <img width="100%" class="border-radius-15" src="{{url('assets/images/'.$value->blog_image)}}" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="entry-content">
                                    <h2 class="post-title mb-20">
                                        <a href="<?php echo url("blog/".$value->blog_slug); ?>"><?php echo $value->blog_title; ?></a>
                                    </h2>
                                    <p class="post-exerpt font-medium text-muted mb-30"><?php echo $value->blog_short_description; ?></p>
                                    <div class="mb-20 entry-meta meta-2">
                                        <div class="entry-meta meta-1 mb-30">
                                            <div class="font-sm">
                                                <span><span class="mr-10 text-muted"><i class="fi-rs-eye"></i></span>23k</span>
                                                <span class="ml-30"><span class="mr-10 text-muted"><i class="fi-rs-comment-alt"></i></span>17k</span>
                                                <span class="ml-30"><span class="mr-10 text-muted"><i class="fi-rs-share"></i></span>18k</span>
                                            </div>
                                        </div>
                                        <a href="<?php echo url("blog/".$value->blog_slug); ?>" class="btn btn-sm">Read more<i class="fi-rs-arrow-right ml-10"></i></a>
                                    </div>
                                </div>
                            </article>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                <?php if(isset($_GET['page'])){ ?>
                                <li class="page-item">
                                    <a class="page-link" href="{{url(Request::segment(1))}}"><i class="fi-rs-arrow-small-left"></i></a>
                                </li>
                                <?php } ?>
                                <?php for($i = 1; $i<=$pagination->lastPage(); $i++){ ?>
                                <li class="page-item <?php if($pagination->currentPage()==$i){echo "active";} ?>"><a class="page-link" href="<?php if($i==1){echo url(Request::segment(1));}else{echo url(Request::segment(1).'?page='.$i);} ?>"><?php echo $i; ?></a></li>
                                <?php } if($pagination->lastPage()!=$pagination->currentPage()){ ?>
                                <li class="page-item">
                                    <a class="page-link" href="{{url(Request::segment(1).'?page='.$pagination->lastPage())}}"><i class="fi-rs-arrow-small-right"></i></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection