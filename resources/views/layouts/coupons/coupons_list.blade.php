<!-- ======= coupon Section ======= -->
<section id="menu" class="menu">
    <div class="container p-3" data-aos="fade-up">
        <div class="row">
            <div class="col">
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
                <div class="row">
                    @forelse ($coupons as $coupon)
                        <div class="col-6 mb-3">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ asset('assets/img/coupon/promo-code.png') }}" class="card-img-top"
                                    alt="...">
                                <div class="card-body text-center">
                                    <h5 class="card-title fs-1">{{ strtoupper($coupon->code) }}</h5>
                                    <p class="card-text">Discount Percentage: {{ $coupon->porcentaje * 100 }}%</p>
                                    <a href="{{ route('update_status', $coupon->id) }}" class="btn btn-{{ $coupon->status == 1 ? 'success' : 'danger' }}" title="click to change">
                                        {{ $coupon->status == 1 ? 'Enabled' : 'Disabled' }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section><!-- End coupon Section -->
