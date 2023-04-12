<section class="content" class="d-flex">
    <div class="sidebar bg-light border shadow-sm" id="side_nav" wire:ignore>
        <div class="px-2 pt-5 pt-md-1">
            <h1 class="px-2 fw-bold fs-3">
                Filters
            </h1>
        </div>

        <div class="px-2">
            <div class="card bg-body border-0">
                <div class="card-header border-0 text-bg-dark rounded">
                    <h6 class="card-title fw-bold m-0">Brands</h6>
                </div>
                <div class="card-body">
                <div class="card-text">
                    @foreach($category->brands as $brand)
                        <div class="form-check pb-1">
                            <input class="form-check-input" type="checkbox" value="{{ $brand->id }}" id="brand_in_category" 
                            wire:model.debounce.500ms="brands">
                            <label class="form-check-label fw-bold" for="brand_in_category">
                            {{ $brand->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                </div>
            </div>
        </div>

        <div class="px-2">
            <div class="card bg-body border-0">
                <div class="card-header border-0 text-bg-dark rounded">
                <h6 class="card-title fw-bold m-0">Prices</h6>
                </div>
                <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="">
                        <label for="min_price" class="form-label fw-bold mb-0">Min</label>
                        <input type="number" id="min_price" wire:model.debounce.500ms="min_price" class="form-control">
                    </div>
                    <div class="px-2 pt-4">
                        <span>
                        <i class="fa-solid fa-minus"></i>
                        </span>
                    </div>
                    <div class="">
                        <label for="max_price" class="form-label fw-bold mb-0">Max</label>
                        <input type="number" id="max_price" wire:model.debounce.500ms="max_price" class="form-control">
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-md-none d-block" id="opn-cls-btn" wire:ignore>
       <button class="btn px-1 py-0 open-btn">
       <i class="fa-solid fa-bars-staggered"></i>
       </button>
    </div>

    <div class="px-4 py-5">
       <div>
          <h1>
             <a href="{{ route('main.categories') }}" class="link-dark breadcrumbs">Categories</a> /
             <a href="" class="breadcrumbs link-secondary">{{ $category->name }}</a>
          </h1>
          <div class="row px-3 pt-3" >
            @if($product_list->count() == 0)
                <div class="col-12">
                    <div class="alert alert-danger">
                        <span class="fw-bold">No products found...</span>
                    </div>
                </div>
            @endif

            @forelse($product_list as $product)
            <div class="col-6 col-md-4 col-lg-2 p-1">
                <a id="product" href="{{ route('main.product', ['slug' => $product->slug, 'id' => $product->id ])}}" class="text-decoration-none">
                    <div class="card bg-body shadow-sm">
                        <img src="{{ asset('storage/'.$product->images->first()->filename ) }}" class="card-img-top" alt="{{ $product->name }} image" height="160px">
                        <div class="card-body p-2 m-0">
                            <div class="card-text p-0 m-0 mb-1">
                            <h6 class="fw-bold link-dark pt-1">
                                {{  $product->name }}
                            </h6>
                            </div>
                            <h6 class="text-warning m-0 p-0">
                            {{-- <span class="text-dark fs-5">P {{ $product->stocks[0]->selling_price }} --}}
                            <span class="text-dark fs-5">P {{ $product->stocks->first()->selling_price }}
                            </span>
                            </h6>
                            <div class="d-flex justify-content-between">
                            <small class="text-danger">
                            <span class="text-dark">P</span>
                            <s>{{ $product->stocks->first()->original_price }}</s>
                            </small>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
          </div>
       </div>
    </div>
 </section>