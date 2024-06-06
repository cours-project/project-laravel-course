@extends('layout.client')
@section('content')
    <!-- Banner Area Start-->
   @include('home::component.banner')
    <!-- Banner Area End -->


    <!-- intro Area Start-->
   @include('home::component.introArea')
    
    <!-- intro Area End -->

    <!-- trending courses Area Start-->
    @include('home::component.trendingCourse')
  
    <!-- trending courses Area End -->

    <!-- intro Area Start-->
    @include('home::component.introArea2')
   
    <!-- intro Area End -->

    <!-- enllor courses Area Start-->
    @include('home::component.enllorCourse')
  
    <!-- enllor courses Area End -->

    <!-- testimonial courses Area Start-->
    @include('home::component.testimonial')
   
    <!-- testimonial courses Area End -->

    <!-- about Area Start-->
    @include('home::component.aboutArea')
    
    <!-- about Area End -->
@endsection