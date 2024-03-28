<section id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">
        <div class="row g-0">

            <div class="col-lg-4 reservation-img"
                style="background-image: url({{ asset('assets/img/reservation.jpg') }});" data-aos="zoom-out"
                data-aos-delay="200"></div>

            <div class="col-lg-8 d-flex align-items-center">
                <form method="POST" action="{{ route('update_category', $category->id) }}" role="form"
                    class=" w-100 justify-content-center" data-aos="fade-up" data-aos-delay="100">

                    @method('put')

                    @csrf {{-- directiva para enviar la información --}}
                    <div class="row p-5">
                        <h1>Editing {{ $category->nombre_categoria }} Category</h1>
                        <div class="mb-3">
                            <label for="nombre_categoria">Name:</label>
                            <input type="text" name="nombre_categoria" class="form-control" id="nombre_categoria"
                                placeholder="Category name" value="{{ $category->nombre_categoria }}">
                            @error('nombre_categoria')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="descripcion_categoria">Description:</label>
                            <input type="text" name="descripcion_categoria" class="form-control"
                                id="descripcion_categoria" placeholder="Category description"
                                value="{{ $category->descripcion_categoria }}">
                            @error('descripcion_categoria')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="text-center m-3"><button type="submit"
                                class="btn btn-danger rounded-5">Update</button>
                        </div>
                    </div>
                </form>

            </div><!-- End Reservation Form -->

        </div>

    </div>
