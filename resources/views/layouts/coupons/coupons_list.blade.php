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
                <form method="POST" action="{{ route('store_coupon') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="couponForm" class="form-label">Coupon Code</label>
                        <input type="text" name="code" class="form-control" id="couponForm"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="discountPercentage" class="form-label">Discount Percentage %</label>
                        <input type="number" name="porcentaje" min="0" max="100" class="form-control"
                            id="discountPercentage">
                    </div>
                    <button type="submit" class="btn btn-danger rounded-5">Add</button>
                </form>
            </div>
            <div class="col border rounded-3 shadow p-3">
                <div class="row" style="max-height: 400px; overflow-y: auto;">
                    @forelse ($coupons as $coupon)
                        <div class="col mb-3 d-flex justify-content-center">
                            <div class="card" style="width: 16rem;">
                                <form method="POST" class="text-end"
                                    action="{{ isset($coupon) ? route('delete_coupon', $coupon->id) : '' }}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn" title="DELETE"><i
                                            class="bi bi-trash"></i></button>
                                </form>
                                <img src="{{ asset('assets/img/coupon/promo-code.png') }}" class="card-img-top"
                                    alt="promo-code">
                                <div class="card-body text-center">
                                    <h5 class="card-title fs-5">{{ strtoupper($coupon->code) }}</h5>
                                    <p class="card-text">Discount Percentage: {{ $coupon->porcentaje * 100 }}%</p>
                                    <a href="{{ route('update_status', $coupon->id) }}"
                                        class="btn btn-{{ $coupon->status == 1 ? 'success' : 'danger' }}"
                                        title="click to change">
                                        {{ $coupon->status == 1 ? 'Enabled' : 'Disabled' }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-6 my-auto mx-auto">
                            <div class="card" style="width: 16rem;">
                                <img src="{{ asset('assets/img/coupon/promo-code.png') }}" class="card-img-top"
                                    alt="promo-code">
                                <div class="card-body text-center">
                                    <h5 class="card-title fs-5">No coupons added</h5>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section><!-- End coupon Section -->