@extends('layouts.landing')
@section('title', 'Details')
@section('content')
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
            </div>
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Plate</th>
                            <th scope="col">Units</th>
                            <th scope="col">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $subtotal = 0
                        @endphp
                        @forelse($currentDetails as $key => $detail)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $detail['nombre_plato'] }}</td>
                                <td>{{ $detail['units'] }}</td>
                                <td>${{ number_format($detail['subtotal'], 0, ',', '.') }}</td>
                                @php
                                    $subtotal += $detail['subtotal']
                                @endphp
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <h1 class="text-danger">There are no details</h1>
                                </td>
                            </tr>
                        @endforelse
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="text-end">Subtotal</td>
                            <td>
                                <p>${{ number_format($subtotal, 0, ',', '.') }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="text-end">Discount</td>
                            <td>
                                <p>${{ number_format($subtotal - $lastOrder->total, 0, ',', '.') }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="text-end">TOTAL</td>
                            <td>
                                <p>${{ number_format($lastOrder->total, 0, ',', '.') }}</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section><!-- End coupon Section -->


@endsection
