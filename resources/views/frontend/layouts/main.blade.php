@extends('frontend.layouts.app')

@section('title', 'Dashboard')

@section('content')
<section id="billboard">

		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<button class="prev slick-arrow">
						<i class="icon icon-arrow-left"></i>
					</button>

					<div class="main-slider pattern-overlay">
						<div class="slider-item">
							<div class="banner-content">
								<h2 class="banner-title">Life of the Wild</h2>
								<p>The book is about birds how do they spend thier lives together and has social lives like human and keep in touch every few times to make sure.</p>
								<div class="btn-wrap">
									<a href="#" class="btn btn-outline-accent btn-accent-arrow">Read More<i
											class="icon icon-ns-arrow-right"></i></a>
								</div>
							</div><!--banner-content-->
							<img src="{{ asset('frontend/images/main-banner1.jpg') }}" alt="banner" class="banner-image">
						</div><!--slider-item-->

						<div class="slider-item">
							<div class="banner-content">
								<h2 class="banner-title">Birds gonna be Happy</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero
									ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend. Amet, quis
									urna, a eu.</p>
								<div class="btn-wrap">
									<a href="#" class="btn btn-outline-accent btn-accent-arrow">Read More<i
											class="icon icon-ns-arrow-right"></i></a>
								</div>
							</div><!--banner-content-->
							<img src="{{ asset('frontend/images/main-banner2.jpg') }}" alt="banner" class="banner-image">
						</div><!--slider-item-->

					</div><!--slider-->

					<button class="next slick-arrow">
						<i class="icon icon-arrow-right"></i>
					</button>

				</div>
			</div>
		</div>

	</section>

	<section id="featured-books" class="py-5 my-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">


					<div class="product-list" data-aos="fade-up">
						<div class="row">
						@foreach ($categories as $category)
						   @if($category->books->isNotEmpty())
								<div class="section-header align-center">
									<h2 class="section-title">{{ $category->name }}</h2>
								</div>
								@foreach($category->books as $book)
								<div class="col-md-3">
									<div class="product-item">
										<figure class="product-style">
											@if($book->hasMedia('covers'))
											<a href="{{ route('books.show', $book) }}">
												<img src="{{ asset($book->getFirstMediaUrl('covers')) }}" alt="Books" class="product-item">
											</a>
											@else
												<div class="text-muted">No Cover Image</div>
											@endif
											<form action="{{ route('orders.store') }}" method="POST">
												@csrf
												<input type="hidden" name="book_id" value="{{ $book->id }}">
												<input type="hidden" name="quantity" value="1">
												<button class="add-to-cart" data-product-tile="add-to-cart">Add to
													Cart</button>
											</form>
										</figure>
										<figcaption>
											<h3>{{$book->title}}</h3>
											<div class="item-price">RM {{$book->price}}</div>
										</figcaption>
									</div>
								</div>
								@endforeach
								<div class="row">
									<div class="col-md-12">

										<div class="btn-wrap align-right">
											<a href="#" class="btn-accent-arrow">View all products <i
													class="icon icon-ns-arrow-right"></i></a>
										</div>

									</div>
								</div>
							@endif
						@endforeach

						</div><!--ft-books-slider-->
					</div><!--grid-->


				</div><!--inner-content-->
			</div>

			
		</div>
	</section>

@endsection