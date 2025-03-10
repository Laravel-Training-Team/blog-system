@extends('blog.layouts.master')
@section('title', 'Posts Page')
@section('main')
    <div class="content">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <article class="post-grid mb-5 ">
                    <a class="post-thumb mb-4 d-block" href="{{route('blog-single.view')}}">
                        <img src="{{ asset('blog-assets/images/news/news-1.jpg') }}" alt="" class="img-fluid w-100">
                    </a>

                    <div class="post-content-grid">
                        <div class="label-date">
                            <span class="day">15</span>
                            <span class="month text-uppercase">apr</span>
                        </div>
                        <span class="cat-name text-color font-extra font-sm text-uppercase letter-spacing">Travel</span>
                        <h3 class="post-title mt-1"><a href="{{route('blog-single.view')}}">The best soft chocolate chip
                                cookies</a></h3>
                        <p>Lorem ipsum dolor sitamet consectetu ocilng elit. Donec eros aseb dui, suscipit ex uti
                            commodo dignis justo acas turpis egestas. Nullam et cursus</p>
                    </div>
                </article>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <article class="post-grid mb-5">
                    <a class="post-thumb mb-4 d-block" href="{{route('blog-single.view')}}">
                        <img src="{{ asset('blog-assets/images/news/news-2.jpg') }}" alt="" class="img-fluid w-100">
                    </a>
                    <div class="post-content-grid">
                        <div class="label-date">
                            <span class="day">02</span>
                            <span class="month text-uppercase">Jan</span>
                        </div>
                        <span class="cat-name text-color font-sm font-extra text-uppercase letter-spacing">lifestyle</span>
                        <h3 class="post-title mt-1"><a href="{{route('blog-single.view')}}">A Simple Way to Feel Like Home</a>
                        </h3>
                        <p>Lorem ipsum dolor sitamet consectetu ocilng elit. Donec eros aseb dui, suscipit ex uti
                            commodo dignis justo acas turpis egestas. Nullam et cursus</p>

                    </div>

                </article>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <article class="post-grid mb-5">
                    <a class="post-thumb mb-4 d-block" href="{{route('blog-single.view')}}">
                        <img src="{{ asset('blog-assets/images/news/news-3.jpg') }}" alt="" class="img-fluid w-100">
                    </a>
                    <div class="post-content-grid">
                        <div class="label-date">
                            <span class="day">20</span>
                            <span class="month text-uppercase">sep</span>
                        </div>
                        <span class=" cat-name text-color font-sm font-extra text-uppercase letter-spacing">weekends</span>
                        <h3 class="post-title mt-1"><a href="{{route('blog-single.view')}}">5 tips to plan your weekends</a>
                        </h3>
                        <p>Lorem ipsum dolor sitamet consectetu ocilng elit. Donec eros aseb dui, suscipit ex uti
                            commodo dignis justo acas turpis egestas. Nullam et cursus</p>
                    </div>

                </article>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <article class="post-grid mb-5">
                    <a class="post-thumb mb-4 d-block" href="{{route('blog-single.view')}}">
                        <img src="{{ asset('blog-assets/images/news/news-4.jpg') }}" alt="" class="img-fluid w-100">
                    </a>
                    <div class="post-content-grid">
                        <div class="label-date">
                            <span class="day">05</span>
                            <span class="month text-uppercase">may</span>
                        </div>
                        <span class="cat-name text-color font-sm font-extra text-uppercase letter-spacing">Lifestyle</span>
                        <h3 class="post-title mt-1"><a href="{{route('blog-single.view')}}">The best to-do list to boost your
                                productivity</a></h3>
                        <p>Lorem ipsum dolor sitamet consectetu ocilng elit. Donec eros aseb dui, suscipit ex uti
                            commodo dignis justo acas turpis egestas. Nullam et cursus</p>
                    </div>

                </article>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <article class="post-grid mb-5">
                    <a class="post-thumb mb-4 d-block" href="{{route('blog-single.view')}}">
                        <img src="{{ asset('blog-assets/images/news/news-5.jpg') }}" alt="" class="img-fluid w-100">
                    </a>
                    <div class="post-content-grid">
                        <div class="label-date">
                            <span class="day">30</span>
                            <span class="month text-uppercase">mar</span>
                        </div>
                        <span class="cat-name text-color font-sm font-extra text-uppercase letter-spacing">Travel</span>
                        <h3 class="post-title mt-1"><a href="{{route('blog-single.view')}}">What kind of travel you are?</a>
                        </h3>
                        <p>Lorem ipsum dolor sitamet consectetu ocilng elit. Donec eros aseb dui, suscipit ex uti
                            commodo dignis justo acas turpis egestas. Nullam et cursus</p>
                    </div>

                </article>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <article class="post-grid mb-5">
                    <a class="post-thumb mb-4 d-block" href="{{route('blog-single.view')}}">
                        <img src="{{ asset('blog-assets/images/news/news-6.jpg') }}" alt="" class="img-fluid w-100">
                    </a>

                    <div class="post-content-grid">
                        <div class="label-date">
                            <span class="day">24</span>
                            <span class="month text-uppercase">jun</span>
                        </div>
                        <span class="cat-name text-color font-sm font-extra text-uppercase letter-spacing">Explore</span>
                        <h3 class="post-title mt-1"><a href="{{route('blog-single.view')}}">Explore the whole world </a></h3>
                        <p>Lorem ipsum dolor sitamet consectetu ocilng elit. Donec eros aseb dui, suscipit ex uti
                            commodo dignis justo acas turpis egestas. Nullam et cursus</p>

                    </div>

                </article>
            </div>
        </div>



        <div class="pagination pt-4 mb-5 justify-content-center">
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#" class="active">1</a></li>
                <li class="list-inline-item"><a href="#">2</a></li>
                <li class="list-inline-item"><a href="#">3</a></li>
                <li class="list-inline-item"><a href="#" class="prev-posts"><i class="ti-arrow-right"></i></a></li>
            </ul>
        </div>
    </div>
@endsection
