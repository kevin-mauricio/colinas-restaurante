<!-- ======= Menu Section ======= -->
<section id="menu" class="menu">
    <div class="container p-3" data-aos="fade-up">
        @if ($alert = Session::get('alert'))
            <div class="row text-center">
                <p class="text-{{ strtoupper($alert['color']) }} fs-5">
                    {{ $alert['message'] }}
                </p>
            </div>
        @else
            <div class="section-header">
                <h2>Our Menu</h2>
                <p>Check Our <span>Colinas Menu</span></p>
            </div>
        @endif

        <div class="row text-center">
            <div class="col">
                <a class="btn btn-danger rounded-5" href="{{ route('form_plate') }}">Add Plate</a>
            </div>
        </div>

        @if ($categories->isNotEmpty())
            <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <li class="nav-item">
                    <a href="{{ route('index_plate') }}" class="nav-link {{ isset($status_all) ? 'active' : '' }}">
                        <h4>All</h4>
                    </a>
                </li>
                @php
                    $current_category = 'All';
                @endphp
                @forelse($categories as $key => $category)
                    <li class="nav-item">
                        @if (isset($status) && isset($id_category))
                            @if ($category->id == $id_category)
                                <a class="nav-link {{ $status }}"
                                    href="{{ route('plate_by_category', $category->id) }}">
                                    <h4>{{ $category->nombre_categoria }}</h4>
                                </a>
                                @php
                                    $current_category = $category->nombre_categoria;
                                @endphp
                            @else
                                <a class="nav-link" href="{{ route('plate_by_category', $category->id) }}">
                                    <h4>{{ $category->nombre_categoria }}</h4>
                                </a>
                            @endif
                        @else
                            <a class="nav-link" href="{{ route('plate_by_category', $category->id) }}">
                                <h4>{{ $category->nombre_categoria }}</h4>
                            </a>
                        @endif
                    </li><!-- End tab nav item -->
                @empty
                @endforelse
            </ul>
            <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
                <div class="tab-pane fade active show" id="menu-starters">
                    <div class="tab-header text-center">
                        <p>{{ $current_category }}</p>
                    </div>

                    <div class="row">
                        @forelse ($plates as $plate)
                            <div class="col-lg-3 menu-item border rounded-3 mb-1 pb-3">
                                <button class="btn mt-2" title="EDIT"><a href="{{ route('edit_plate', $plate->id) }}"
                                        class="text-black"><i class="bi bi-pencil-square"></i></a></button>
                                <button class="btn mt-2" title="DELETE"><a href="{{route('update_status_plate', $plate->id)}}"><i
                                        class="bi bi-trash"></i></a></button>
                                <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img
                                        src="{{ asset('assets/img/menu/menu-item-1.png') }}" class="menu-img img-fluid"
                                        alt=""></a>
                                <h4>{{ $plate->nombre_plato }}</h4>
                                <p class="ingredients">
                                    {{ $plate->descripcion }}
                                </p>
                                <p class="price">
                                    $ {{ number_format($plate->precio, 0, ',', '.') }} COP
                                </p>
                            </div><!-- Menu Item -->
                        @empty
                            <div class="col-lg-4 menu-item mx-auto">
                                <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img
                                        src="{{ asset('assets/img/empty-plate.jpg') }}" class="menu-img img-fluid"
                                        alt=""></a>
                                <h4>No plates added</h4>
                                <p class="price">
                                    $0.00
                                </p>
                            </div><!-- Menu Item -->
                        @endforelse
                    </div><!-- End Starter Menu Content -->
                </div>
            </div>
        @else
            <div class="col-lg-4 menu-item text-center m-auto pt-3">
                <img src="{{ asset('assets/img/empty-plate.jpg') }}" class="menu-img img-fluid w-75" alt="no-plate">
                <h2 class="p-3">No plates added</h2>
            </div><!-- Menu Item -->
        @endif
    </div>
</section><!-- End Menu Section -->

<!-- Modal Delete -->
<div class="modal fade" id="idModalDeletePlate" tabindex="-1" aria-labelledby="modalDelete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalDelete">Deleting...</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure?
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ isset($plate) ? route('delete_plate', $plate->id) : '' }}">
                    @method('DELETE')
                    @csrf
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-light" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
