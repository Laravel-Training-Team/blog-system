@extends('blog.layouts.master')
@section('title', 'Contact Page')
@section('main')
<div class="content">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center">
                       <h2 class="lg-title">Contact</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <section class="pt-5 padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    
    
    <div class="row">
        <div class="col-lg-12">
            <img src="{{ asset('blog-assets/images/contact.jpg')}}" alt="" class="img-fluid w-100">
        </div>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <p class="mt-5 mb-5">Something splashing about in the pool a little way off, and she swam nearer to make out what it was: at first she thought it must be a walrus or hippopotamus, but then she remembered how small she was now, and she soon made out that it was only a mouse that had slipped in like herself.</p>
    
            <h2 class="mb-4">Get In Touch</h2>
    
            <form id="contact-form" class="contact-form">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Your Name (required)</label>
                            <input class="form-control form-control-name" name="name" id="name" type="text" required >
                        </div>
    
                        <div class="form-group">
                            <label for="email">Your Email (required)</label>
    
                            <input class="form-control form-control-email" name="email" id="email" type="email" required >
                        </div>
    
                        <div class="form-group">
                            <label for="message">Your Message</label>
                            <textarea class="form-control form-control-message" name="message" id="message" rows="7" required ></textarea>
                        </div>
    
                        <button class="btn btn-primary solid blank mt-3" type="submit">Send Message</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    
    
                
                </div>
            </div>
        </div>
    </section>
    
</div>
@endsection