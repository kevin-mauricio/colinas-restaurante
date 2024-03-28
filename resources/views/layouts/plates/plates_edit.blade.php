    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Book A Table</h2>
                <p>Editing a <span>Delicious</span> Plate</p>
            </div>

            <div class="row g-0">

                <div class="col-lg-4 reservation-img" style="background-image: url({{asset('assets/img/reservation.jpg')}});"
                    data-aos="zoom-out" data-aos-delay="200"></div>

                <div class="col-lg-8 d-flex align-items-center">
                    <form action="{{ route('update_plate', $plate->id) }}" method="POST" role="form"
                        class="php-email-form p-5" data-aos="fade-up" data-aos-delay="100">
                        @method('put')
                        @csrf
                        <div class="row gy-4">
                            <div class="mb-3">
                                <label class="mb-1" for="nombre_plato">Name:</label>
                                <input type="text" name="nombre_plato" class="form-control" id="nombre_plato"
                                    placeholder="Name" data-rule="minlen:4" value="{{ $plate->nombre_plato }}">
                                @error('nombre_plato')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="mb-1" for="descripcion">Description:</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion"
                                    placeholder="Description" value="{{ $plate->descripcion }}">
                                @error('descripcion')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label class="mb-1" for="precio">Price:</label>
                                <input type="number" class="form-control" name="precio" id="precio"
                                    placeholder="Price" value="{{ $plate->precio }}">
                                @error('precio')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label class="mb-1" for="costo">Cost:</label>
                                <input type="number" name="costo" class="form-control" id="costo"
                                    placeholder="Cost" value="{{ $plate->costo }}">
                                @error('costo')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- categories option --}}
                            <div class="col-lg-4">
                                <label class="mb-1" for="id_categoria">Category:</label>
                                <select class="form-select" name="id_categoria" id="id_categoria">
                                    <option value="null">select category</option>
                                    @forelse ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $plate->id_categoria == $category->id ? 'selected' : '' }}>
                                            {{ $category->nombre_categoria }}
                                        </option>
                                    @empty
                                        <option value="null">No categories added</option>
                                    @endforelse
                                </select>
                                @error('id_categoria')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="text-center"><button class="" type="submit">Update</button></div>
                    </form>
                </div><!-- End Reservation Form -->

            </div>

        </div>
    </section><!-- End Book A Table Section -->
