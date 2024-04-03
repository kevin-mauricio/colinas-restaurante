<section id="why-us" class="why-us">
    <div class="container" data-aos="fade-up">
        <div class="row gy-4 p-5 text-center">

            @if ($alert = Session::get('alert'))
                <div class="row text-center">
                    <p class="text-{{ $alert['color'] }} fs-1">
                        {{ strtoupper($alert['message']) }}
                    </p>
                </div>
            @else
                <div class="section-header">
                    <p>Check Our <span>Colinas Categories</span></p>
                </div>
            @endif

            <div class="row text-center">
                <div class="col mb-3">
                    <button class="btn btn-danger rounded-5">
                        <a class="text-white" href="{{ route('form_category') }}">Create Category</a>
                    </button>
                </div>
                @if ($categories->isNotEmpty())
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="col">#</th>
                                <th class="col-10 text-start" scope="col">Category</th>
                                <th class="col" scope="col">Edit</th>
                                <th class="col" scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $key => $category)
                                <tr>
                                    <td scope="row">
                                        {{ $key + 1 }}
                                    </td>
                                    <td class="text-start">
                                        <a class="text-dark" title="info"
                                            href="{{ route('show_category', $category->id) }}">{{ $category->nombre_categoria }}</a>
                                    </td>
                                    <td>
                                        <button class="btn btn-light"><a title="EDIT"
                                                href="{{ route('edit_category', $category->id) }}" class="text-dark"><i
                                                    class="bi bi-pencil-square"></i></a></button>
                                    </td>
                                    <td>
                                        <button title="DELETE" type="submit" class="btn btn-light"
                                            data-bs-toggle="modal" data-bs-target="#idModalDelete"><i
                                                class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th scope="row">
                                        No categories added
                                    </th>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                @else
                    <h4>No categories added</h4>
                @endif
            </div>
        </div>
    </div>
</section><!-- End Why Us Section -->

<!-- Modal Delete -->
<div class="modal fade" id="idModalDelete" tabindex="-1" aria-labelledby="modalDelete" aria-hidden="true">
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
                <form method="POST" action="{{ isset($category) ? route('delete_category', $category->id) : "" }}">
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
