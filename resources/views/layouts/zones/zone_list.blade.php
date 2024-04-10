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
                            {{ strtoupper($alert['message']) }}
                        </p>
                    </div>
                @endif
            @endif
            <div class="col p-3">
                <form method="POST" action="{{route('store_zone')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="zoneName" class="form-label">Zone name:</label>
                        <input type="text" name="zone_name" class="form-control" id="zoneName">
                    </div>
                    <div class="mb-3">
                        <label for="priceDelivery" class="form-label">Delivery price</label>
                        <input type="number" name="price_delivery" min="0" class="form-control" id="priceDelivery">
                    </div>
                    <button type="submit" class="btn btn-danger rounded-5">Add</button>
                </form>
            </div>
            <div class="col border rounded-3 shadow p-4">
                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Zone</th>
                                <th scope="col">Delivery price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($zones as $key => $zone)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $zone->zone_name }}</td>
                                    <td>${{ number_format($zone->price_delivery, 0, ',', '.') }} COP</td>
                                    <td>
                                        <form method="POST" action="{{ isset($zone) ? route('delete_zone', $zone->id) : '' }}">
                                            @method('DELETE')
                                            @csrf   
                                            <button type="submit" class="btn btn-light" title="DELETE {{$zone->zone_name}}"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th>No zones added</th>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section><!-- End coupon Section -->
