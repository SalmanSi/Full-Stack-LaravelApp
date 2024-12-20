@extends('layouts.app')

@section('title', 'Home | Pam England\'s Sculpture Studio')

@section('styles')
    <link href="{{ asset('assets/home.css') }}" rel="stylesheet">
@endsection

@section('header')
    <div class="main-div">
        <nav>
            <img src="{{ asset('assets/images/sculpture.png') }}" alt="Sculpture Logo" class="o"/>
        </nav>
        <h1 id="nav_h1">Welcome to Pam England's Sculpture Studio</h1>
        <div class="nav-icons">
            <a href="/contact"><img class="nav-img" src="{{ asset('assets/images/phone.png') }}" alt="Phone Icon" /></a>
            <a href="https://www.facebook.com" target="_blank"><img class="nav-img" src="{{ asset('assets/images/facebook.png') }}" alt="Facebook Icon" /></a>
            <a href="https://www.twitter.com" target="_blank"><img class="nav-img" src="{{ asset('assets/images/twitter.png') }}" alt="Twitter Icon" /></a>
            <a href="https://www.instagram.com" target="_blank"><img class="nav-img" src="{{ asset('assets/images/instagram.png') }}" alt="Instagram Icon" /></a>
        </div>
    </div>
@endsection

@section('content')
    <main>
        <section class="services">
            <div id="kinetic" class="service-box">
                <h3>Kinetic Sculpture</h3>
                <p>
                    Our kinetic sculpture is a mesmerizing blend of art and engineering,
                    designed to captivate the viewer through fluid, graceful motion.
                    Crafted with precision and a deep understanding of balance and form,
                    this sculpture transforms simple mechanical movement into an
                    artistic expression that feels almost alive. It continuously evolves
                    as it moves, creating an ever-changing visual experience that
                    highlights the beauty of motion and mechanics. Ideal for both indoor
                    and outdoor spaces, this piece serves as a focal point, evoking a
                    sense of wonder and tranquility in all who observe it."
                </p>
            </div>
            <div id="cast" class="service-box">
                <h3>Cast Sculpture</h3>
                <p>
                    Our cast sculpture captures the beauty and strength of solid forms,
                    molded with precision and care. Each detail reflects the art of
                    shaping raw materials into a timeless piece that embodies durability
                    and creativity. This sculpture stands as a testament to the mastery
                    of casting techniques, bringing to life the intricate balance
                    between form and function. Perfect for both artistic and functional
                    spaces, it evokes a sense of stability and craftsmanship in every
                    view."
                </p>
            </div>
            <div id="relief" class="service-box">
                <h3>Relief Sculpture</h3>
                <p>
                    Our relief sculptures are meticulously crafted to bring depth and
                    dimension to flat surfaces. By sculpting intricate details into the
                    background, we create striking visual narratives that stand out
                    while remaining harmoniously integrated with their surroundings.
                    Each piece captures a moment frozen in time, whether it's a
                    depiction of nature, history, or abstract forms. Perfect for walls,
                    facades, and architectural features, our relief sculptures offer a
                    blend of artistry and texture that adds both beauty and meaning to
                    any space.
                </p>
            </div>
            <div id="Mannerist" class="service-box">
                <h3>Mannerist sculpture</h3>
                <p>
                    Mannerist sculptures in our studio embrace elegance and complexity,
                    featuring elongated forms, dynamic twists, and expressive poses.
                    Inspired by the style's refinement and drama, our works capture the
                    movement and tension that define this unique artistic period.
                </p>
            </div>
            <div id="Modernist" class="service-box">
                <h3>Modernist sculpture</h3>
                <p>
                    Modernist sculptures in our studio focus on abstraction and
                    innovation, breaking away from traditional forms. Emphasizing
                    simplicity, geometric shapes, and new materials, our works reflect
                    the bold experimentation and creativity that define the Modernist
                    movement.
                </p>
            </div>
        </section>
        <section class="hero">
            <h2>Learn, Create, and Enjoy</h2>
            <a href="/courses" class="btn">View Courses</a>
            <a href="/shop" class="btn">Shop Sculptures</a>
        </section>
        <section class="comments-section">
            <h2>Customer Comments</h2>
            <div class="comment">
                <p>"Well, I never thought you could do so much with clay. The atmosphere was so inviting, which really helped bring out your creative side."</p>
                <p class="author">- Pam England's Customer</p>
            </div>
            <div class="comment">
                <p>"I've wanted to get some sort of gift for my daughter besides just the usual wedding gifts. You know it would be good to give her just that something extra."</p>
                <p class="author">- Pam England's Customer</p>
            </div>
            <div class="comment">
                <p>"I feel like I really am behind the times with all the new wiz bang gadgets that we have these days. It was great to be involved in something that didn't need anything but clay, water, and a good creative mind."</p>
                <p class="author">- Pam England's Customer</p>
            </div>
        </section>
    </main>
@endsection