<div class="offcanvas offcanvas-end px-3 py-2" data-bs-backdrop="static" tabindex="-1" id="editBackdrop" aria-labelledby="editBackdropLabel">
  <div class="offcanvas-header justify-content-center">
    <button type="button" class="border-0 ms-4 d-inline-block bg-transparent position-absolute start-0 me-3" data-bs-dismiss="offcanvas" aria-label="Close">
      <i class="bi bi-x fs-3 text-muted"></i>
    </button>

    <h5 class="offcanvas-title text-center w-100" id="editBackdropLabel">
        @yield('edit-menu-title')
    </h5>

    <button type="button" class="border-0 ms-4 d-inline-block bg-transparent position-absolute end-0 me-3">
      <i class="bi bi-trash fs-5 text-muted"></i>
    </button>
  </div>

  <div class="offcanvas-body d-flex flex-column">
    <form id="updateForm" method="POST" enctype="multipart/form-data" class="w-100 d-flex flex-column gap-3">
        @csrf
        @method('PUT')

        <input type="hidden" name="id" id="edit_id">

        <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
            <img id="preview_photo" src="#" alt="Pré-visualização" class="mt-2 mx-auto rounded-circle" style="width: 10rem; height: 10rem; object-fit: contain;">
            <label class="mx-auto text-decoration-underline" for="edit_photo" style="font-size: 15px; color: rgba(89, 62, 117, 1); cursor: pointer "">Atualizar foto</label>
            <input class="form-control border-dark border-opacity-25" style="display: none" type="file" name="photo" id="edit_photo" accept="image/*">      
        </div>

        <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
            <label class="fw-lighter" for="edit_name" style="font-size: 15px;">Nome completo:</label>
            <input class="form-control border-dark border-opacity-25" type="text" name="name" id="edit_name" placeholder="Digite o nome">
        </div>

        <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
            <label class="fw-lighter" for="edit_email" style="font-size: 15px;">E-mail:</label>
            <input class="form-control border-dark border-opacity-25" type="email" name="email" id="edit_email" placeholder="Digite o e-mail">
        </div>
    </form>
  </div>

  <div class="offcanvas-footer mt-auto pb-3">
    <button class="btn btn-primary w-100 mb-3" style="background-color: rgba(89, 62, 117, 1)" type="submit" form="updateForm">
      Atualizar
    </button>
    <button class="btn w-100 border-dark" type="button" data-bs-dismiss="offcanvas">
      Cancelar
    </button>
  </div>
</div>

@push('scripts')
<script>
    // Preview da imagem
    const photoInput = document.getElementById('edit_photo');
    const previewImg = document.getElementById('preview_photo');

    photoInput.addEventListener('change', function() {
        const file = this.files[0];
        if(file){
            const reader = new FileReader();
            reader.onload = function(e){
                previewImg.src = e.target.result;
                previewImg.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            previewImg.src = '#';
            previewImg.style.display = 'none';
        }
    });

    // Popula formulário ao abrir offcanvas
    const editButtons = document.querySelectorAll('.dropdown-item[data-bs-target="#editBackdrop"]');
    const updateForm = document.getElementById('updateForm');

    editButtons.forEach(btn => {
        btn.addEventListener('click', function(){
            const id = this.dataset.id;

            document.getElementById('edit_id').value = id;
            document.getElementById('edit_name').value = this.dataset.name || '';;
            document.getElementById('edit_email').value = this.dataset.email;

            updateForm.action = `/home/users/${id}`;

            const previewImg = document.getElementById('preview_photo');
            if (this.dataset.photo) {
                previewImg.src = `/storage/${this.dataset.photo}`;
                previewImg.style.display = 'block';
            } else {
                previewImg.src = '#';
                previewImg.style.display = 'none';
            }
        });
    });
</script>
@endpush
