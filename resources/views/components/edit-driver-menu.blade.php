<div class="offcanvas offcanvas-end px-3 py-2" data-bs-backdrop="static" tabindex="-1" id="editDriverBackdrop" aria-labelledby="editDriverBackdropLabel">
    <div class="offcanvas-header justify-content-center">
        <button type="button" class="border-0 ms-4 d-inline-block bg-transparent position-absolute start-0 me-3" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="bi bi-x fs-3 text-muted"></i>
        </button>

        <h5 class="offcanvas-title text-center w-100" id="editBackdropLabel">
            Motorista
        </h5>

        <button type="button" class="border-0 ms-4 d-inline-block bg-transparent position-absolute end-0 me-3">
            <i class="bi bi-trash fs-5 text-muted"></i>
        </button>
    </div>

    <div class="offcanvas-body d-flex flex-column">
        <form id="updateDriverForm" method="POST" enctype="multipart/form-data" class="w-100 d-flex flex-column gap-3">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" id="driver_id">

            <div class="mb-3 d-flex flex-column gap-2 w-100">
                <span class="fw-bold">Foto de Perfil</span>
                <img id="driver_preview_photo" src="#" alt="Pré-visualização" class="mt-2 mx-auto rounded-circle" style="width: 10rem; height: 10rem; object-fit: contain;">
                <label for="driver_photo" class="mx-auto text-decoration-underline" style="font-size: 15px; color: rgba(89, 62, 117, 1); cursor: pointer ">Atualizar foto</label>
                <input type="file" name="photo" id="driver_photo" accept="image/*" style="display: none">
            </div>

            <div class="d-flex gap-1">
                <span class="fw-bold">Dados Pessoais</span>
                <button type="button" id="data-icon" class="p-0 border-0 bg-transparent"><i class="bi bi-pencil-square"></i></button>
            </div>

            <div class="d-flex flex-column gap-1">
                <div class="mb-3 gap-1 d-flex align-items-center">
                    <label for="driver_name" class="fw-lighter" style="font-size: .9rem">Nome:</label>
                    <input class="form-control rounded-0 border-0 border-opacity-25 fw-lighter px-0" style="width: 8rem; font-size: .9rem; pointer-events:none;" type="text" name="name" id="driver_name" placeholder="Digite o nome">
                </div>
                <div class="mb-3 gap-1 d-flex align-items-center">
                    <label for="driver_bornDate" class="fw-lighter" style="font-size: .9rem">Data de nascimento:</label>
                    <input class="form-control rounded-0 border-0 border-opacity-25 p-0 fw-lighter" style="width: 8rem; font-size: .9rem; pointer-events:none;" type="date" name="bornDate" id="driver_bornDate">
                </div>
                <div class="mb-3 gap-1 d-flex align-items-center">
                    <label for="driver_cpf" class="fw-lighter" style="font-size: .9rem">CPF:</label>
                    <input class="form-control rounded-0 border-0 border-opacity-25 fw-lighter px-0" style="width: 8rem; font-size: .9rem; pointer-events:none;" type="text" name="cpf" id="driver_cpf">
                </div>
                <div class="mb-3 gap-1 d-flex align-items-center">
                    <label for="driver_rg" class="fw-lighter" style="font-size: .9rem">RG:</label>
                    <input class="form-control rounded-0 border-0 border-opacity-25 fw-lighter px-0" style="width: 8rem; font-size: .9rem; pointer-events:none;" type="text" name="rg" id="driver_rg">
                </div>
            </div>

            <div class="d-flex gap-1">
                <span class="fw-bold">Endereço</span>
                <button type="button" id="address-icon" class="p-0 border-0 bg-transparent"><i class="bi bi-pencil-square"></i></button>
            </div>

            <div class="d-flex flex-column gap-1">
                <div class="mb-3 gap-1 d-flex align-items-center">
                    <label for="driver_cep" class="fw-lighter" style="font-size: .9rem">CEP:</label>
                    <input class="form-control rounded-0 border-0 border-opacity-25 fw-lighter px-0" style="width: 8rem; font-size: .9rem; pointer-events:none;" type="text" name="cep" id="driver_cep">
                </div>

                <div class="mb-3 gap-1 d-flex align-items-center">
                    <label for="driver_address" class="fw-lighter" style="font-size: .9rem">Endereço:</label>
                    <input class="form-control rounded-0 border-0 border-opacity-25 fw-lighter px-0" style="width: 8rem; font-size: .9rem; pointer-events:none;" type="text" name="address" id="driver_address">
                </div>

                <div class="mb-3 gap-1 d-flex align-items-center">
                    <label for="driver_number" class="fw-lighter" style="font-size: .9rem">Número:</label>
                    <input class="form-control rounded-0 border-0 border-opacity-25 fw-lighter px-0" style="width: 8rem; font-size: .9rem; pointer-events:none;" type="text" name="number" id="driver_number">
                </div>

                <div class="mb-3 gap-1 d-flex align-items-center">
                    <label for="driver_city" class="fw-lighter" style="font-size: .9rem">Cidade:</label>
                    <input class="form-control rounded-0 border-0 border-opacity-25 fw-lighter px-0" style="width: 8rem; font-size: .9rem; pointer-events:none;" type="text" name="city" id="driver_city">
                </div>

                <div class="mb-3 gap-1 d-flex align-items-center">
                    <label for="driver_state" class="fw-lighter" style="font-size: .9rem">Estado:</label>
                    <input class="form-control rounded-0 border-0 border-opacity-25 fw-lighter px-0" style="width: 8rem; font-size: .9rem; pointer-events:none;" type="text" name="state" id="driver_state">
                </div>
            </div>
            

            <div class="d-flex gap-1">
                <span class="fw-bold">Contato</span>
                <button type="button" id="contact-icon" class="p-0 border-0 bg-transparent"><i class="bi bi-pencil-square"></i></button>
            </div>

            <div class="d-flex flex-column gap-1">
                <div class="mb-3 gap-1 d-flex align-items-center">
                    <label for="driver_email" class="fw-lighter" style="font-size: .9rem">E-mail:</label>
                    <input class="form-control rounded-0 border-0 border-opacity-25 fw-lighter px-0" style="width: 10rem; font-size: .9rem; pointer-events:none;" type="email" name="email" id="driver_email" placeholder="Digite o e-mail">
                </div>

                <div class="mb-3 gap-1 d-flex align-items-center">
                    <label for="driver_phone" class="fw-lighter" style="font-size: .9rem">Telefone:</label>
                    <input class="form-control rounded-0 border-0 border-opacity-25 fw-lighter px-0" style="width: 8rem; font-size: .9rem; pointer-events:none;" type="text" name="phone" id="driver_phone" placeholder="(00) 00000-0000">
                </div>
            </div>
            
        </form>
    </div>

    <div class="offcanvas-footer mt-auto pb-3">
        <button class="btn btn-primary w-100 mb-3" style="background-color: rgba(89, 62, 117, 1)" type="submit" form="updateDriverForm">
            Atualizar
        </button>
        <button class="btn w-100 border-dark" type="button" data-bs-dismiss="offcanvas">
            Cancelar
        </button>
    </div>
</div>

@push('scripts')
<script>
    const toggleEdit = (btn, inputs) => {
        let editing = false;
        btn.addEventListener('click', () => {
            editing = !editing;
            inputs.forEach(input => {
                input.style.pointerEvents = editing ? 'auto' : 'none';
                input.classList.toggle('border', editing);
                input.classList.toggle('border-dark', editing);
                input.classList.toggle('bg-light', editing);
            });
        });
    };

    // Habilitar edição
    toggleEdit(
        document.getElementById('data-icon'),
        document.querySelectorAll('#updateDriverForm [name="name"], #updateDriverForm [name="bornDate"], #updateDriverForm [name="cpf"], #updateDriverForm [name="rg"]')
    );

    toggleEdit(
        document.getElementById('address-icon'),
        document.querySelectorAll('#updateDriverForm [name="cep"], #updateDriverForm [name="address"], #updateDriverForm [name="number"], #updateDriverForm [name="city"], #updateDriverForm [name="state"]')
    );

    toggleEdit(
        document.getElementById('contact-icon'),
        document.querySelectorAll('#updateDriverForm [name="email"], #updateDriverForm [name="phone"]')
    );

    // Preencher formulário ao clicar em editar
    document.querySelectorAll('.btn-edit').forEach(btn => {
        btn.addEventListener('click', function () {
            const id = this.dataset.id;
            const form = document.getElementById('updateDriverForm');
            form.action = `/home/drivers/${id}`;

            document.getElementById('driver_id').value = id;
            document.getElementById('driver_name').value = this.dataset.name || '';
            document.getElementById('driver_cpf').value = this.dataset.cpf || '';
            document.getElementById('driver_rg').value = this.dataset.rg || '';
            document.getElementById('driver_cep').value = this.dataset.cep || '';
            document.getElementById('driver_address').value = this.dataset.address || '';
            document.getElementById('driver_number').value = this.dataset.number || '';
            document.getElementById('driver_city').value = this.dataset.city || '';
            document.getElementById('driver_state').value = this.dataset.state || '';
            document.getElementById('driver_email').value = this.dataset.email || '';
            document.getElementById('driver_phone').value = this.dataset.phone || '';

            if (this.dataset.bornDate) {
                const dateObj = new Date(this.dataset.bornDate);
                const year = dateObj.getFullYear();
                const month = String(dateObj.getMonth() + 1).padStart(2, '0');
                const day = String(dateObj.getDate()).padStart(2, '0');
                document.getElementById('driver_bornDate').value = `${year}-${month}-${day}`;
            } else {
                document.getElementById('driver_bornDate').value = '';
            }

            const previewImg = document.getElementById('driver_preview_photo');
            if (this.dataset.photo) {
                previewImg.src = `/storage/${this.dataset.photo}`;
                previewImg.style.display = 'block';
            } else {
                previewImg.src = '#';
                previewImg.style.display = 'none';
            }
        });
    });

    // Preview de imagem ao selecionar arquivo
    document.getElementById('driver_photo').addEventListener('change', function(){
        const file = this.files[0];
        const preview = document.getElementById('driver_preview_photo');
        if(file){
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    });

    const offcanvasEl = document.getElementById('editDriverBackdrop');
    offcanvasEl.addEventListener('hidden.bs.offcanvas', () => {
        const form = document.getElementById('updateDriverForm');
        form.reset();
        document.getElementById('driver_preview_photo').style.display = 'none';
    });
</script>
@endpush

