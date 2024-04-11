<!-- ======= coupon Section ======= -->
<section id="menu" class="menu">
    <div class="container p-3" data-aos="fade-up">
        <div class="row">
            @if ($alert = Session::get('alert'))
                @if (isset($alert['status']))
                    <div class="row text-center">
                        <p class="text-{{ $alert['status'] ? 'success' : 'danger' }} fs-5">
                            {{ strtoupper($alert['status'] ? 'activated' : 'deactivated') }}
                        </p>
                    </div>
                @else
                    <div class="row text-center">
                        <p class="text-{{ $alert['color'] }} fs-5">
                            {{-- {{ strtoupper($alert['message']) }} --}}
                            {{ $alert['message'] }}
                        </p>
                    </div>
                @endif
            @endif
            <div class="col p-3">
                <form method="POST" action="{{ route('store_order') }}">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" name="name" class="form-control" id="name">
                            </div>
                            <label for="type" class="form-label">Select order type:</label>
                            <select class="form-select" aria-label="Select order type" id="orderType" name="type"
                                class="mb-3">
                                <option value="">---</option>
                                <option value="delivery">Delivery</option>
                                <option value="site">Site</option>
                            </select>
                            <div id="zoneSelection" style="display: none;" class="mb-3">
                                <div class="mb-3">
                                    <label for="phoneNumber" class="form-label">Phone number:</label>
                                    <input type="tel" name="phone" min="0" class="form-control"
                                        id="phoneNumber">
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address:</label>
                                    <input type="text" name="address" min="0" class="form-control"
                                        id="address">
                                </div>
                                <label for="zone" class="form-label">Zone:</label>
                                <select class="form-select" aria-label="Select zone" name="id_zone">
                                    <option value="{{ $zoneSite }}">---</option>
                                    @forelse ($zones as $zone)
                                        @if ($zone->id != $zoneSite)
                                            <option value="{{ $zone->id }}">{{ $zone->zone_name }}</option>
                                        @endif
                                    @empty
                                        <option value="null">no zones added</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="coupon" class="form-label">Coupon opcional:</label>
                                <input type="text" name="coupon" min="0" class="form-control" id="coupon">
                            </div>
                        </div>
                        <div class="col borderd rounded-3 shadow">
                            <div class="row" style="max-height: 500px; overflow-y: auto;">
                                @forelse ($plates as $plate)
                                    <div class="col-lg-6 menu-item border rounded-3 mb-1 text-center p-3">
                                        <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img
                                                src="{{ asset('assets/img/menu/menu-item-1.png') }}"
                                                class="menu-img img-fluid w-50" alt=""></a>
                                        <h4>{{ $plate->nombre_plato }}</h4>
                                        <p class="ingredients">
                                            {{ $plate->descripcion }}
                                        </p>
                                        <p class="price">
                                            $ {{ number_format($plate->precio, 0, ',', '.') }} COP
                                        </p>
                                        <label for="units">add</label>
                                        <input type="number" name="{{$plate->id}}" style="width: 100px">
                                    </div><!-- Menu Item -->
                                @empty
                                    <div class="col-lg-4 menu-item mx-auto">
                                        <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img
                                                src="{{ asset('assets/img/empty-plate.jpg') }}"
                                                class="menu-img img-fluid" alt=""></a>
                                        <h4>No plates added</h4>
                                        <p class="price">
                                            $0.00
                                        </p>
                                    </div><!-- Menu Item -->
                                @endforelse
                            </div><!-- End Starter Menu Content -->
                        </div>
                    </div>
                    <div class="row text-center p-3">
                        <button class="btn btn-danger" type="submit">make</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section><!-- End coupon Section -->

<script>
    document.getElementById('orderType').addEventListener('change', function() {
        var selectedOption = this.value;
        var zoneSelection = document.getElementById('zoneSelection');

        if (selectedOption === 'delivery') {
            zoneSelection.style.display = 'block';
        } else {
            zoneSelection.style.display = 'none';
        }
    });
</script>
