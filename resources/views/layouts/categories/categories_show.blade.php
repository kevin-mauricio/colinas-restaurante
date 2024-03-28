
    <section id="why-us" class="why-us">
        <div class="container" data-aos="fade-up">
            <div class="row p-3">
                <div class="col">
                    <button class="btn btn-danger"><a href="{{route('index_category')}}" class="text-white">Back</a></button>
                </div>
            </div>
          <div class="row gy-4 p-5">
            <table class="table">
                <theads>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->nombre_categoria}}</td>
                        <td>{{$category->descripcion_categoria}}</td>
                    </tr>
                </tbody>
                </table>
            

           </div>
          </div>
        </div>
      </section><!-- End Why Us Section -->
