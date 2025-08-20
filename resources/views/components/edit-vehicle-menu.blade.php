<div class="offcanvas offcanvas-end px-3 py-2" data-bs-backdrop="static" tabindex="-1" id="editVehicleBackdrop" aria-labelledby="editVehicleBackdropLabel">
    <div class="offcanvas-header justify-content-center">
        <button type="button" class="border-0 ms-4 d-inline-block bg-transparent position-absolute start-0 me-3" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="bi bi-x fs-3 text-muted"></i>
        </button>
        <h5 class="offcanvas-title text-center w-100" id="editVehicleBackdropLabel">Editar Veículo</h5>
    </div>

    <div class="offcanvas-body d-flex flex-column">
        <form id="updateVehicleForm" method="POST" class="w-100 d-flex gap-2 flex-column">
            @csrf
            @method('PUT')
            <input type="hidden" id="update_vehicle_id" name="id">

            <span>Editar Veículo: </span>

            <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
                <label for="update_identification_name" class="fw-lighter" style="font-size: 15px;">Nome de identificação:</label>
                <input type="text" class="form-control border-dark border-opacity-25" name="identification_name" id="update_identification_name">
            </div>

            <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
                <label for="update_plate" class="fw-lighter" style="font-size: 15px;">Placa:</label>
                <input type="text" class="form-control border-dark border-opacity-25" name="plate" id="update_plate">
            </div>

            <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
                <label for="update_model" class="fw-lighter" style="font-size: 15px;">Modelo:</label>
                <input type="text" class="form-control border-dark border-opacity-25" name="model" id="update_model">
            </div>

            <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
                <label for="update_chassi" class="fw-lighter" style="font-size: 15px;">Chassi:</label>
                <input type="text" class="form-control border-dark border-opacity-25" name="chassi" id="update_chassi">
            </div>

            <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
                <label for="update_capacity" class="fw-lighter" style="font-size: 15px;">Capacidade:</label>
                <input type="number" class="form-control border-dark border-opacity-25" name="capacity" id="update_capacity">
            </div>

            <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
                <label for="update_bus_type" class="fw-lighter" style="font-size: 15px;">Tipo de Ônibus:</label>
                <input type="text" class="form-control border-dark border-opacity-25" name="bus_type" id="update_bus_type">
            </div>

            <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
                <label for="update_bench" class="fw-lighter" style="font-size: 15px;">Bancada:</label>
                <input type="text" class="form-control border-dark border-opacity-25" name="bench" id="update_bench">
            </div>

            <div class="mb-3 d-flex flex-column gap-2 text-start w-100">
                <label for="update_year" class="fw-lighter" style="font-size: 15px;">Ano:</label>
                <input type="number" class="form-control border-dark border-opacity-25" name="year" id="update_year">
            </div>

            <div class="row row-cols-2 gap-1 mb-3" id="vehicle-features">
                @php
                    $features = [
                        'internet' => ['label' => 'Internet', 'icon' => 'bi-wifi'],
                        'wc' => ['label' => 'Wc', 'icon' => 'bi-badge-wc'],
                        'socket' => ['label' => 'Tomada', 'icon' => 'bi-plug'],
                        'air_conditioning' => ['label' => 'Ar condicionado', 'icon' => 'bi-wind'],
                        'fridge' => ['label' => 'Geladeira', 'icon' => 'bi-snow'],
                        'heating' => ['label' => 'Calefação', 'icon' => 'bi-fire'],
                        'video' => ['label' => 'Vídeo', 'icon' => 'bi-display'],
                    ];
                @endphp

                @foreach($features as $key => $feature)
                    <input type="checkbox" class="btn-check" id="update_{{ $key }}" name="{{ $key }}" value="1" autocomplete="off">
                    <label class="btn btn-outline-secondary" style="width: 11rem; border: 1px solid rgba(89, 62, 117, 1); color: rgba(89, 62, 117, 1);" for="update_{{ $key }}">
                        <i class="bi {{ $feature['icon'] }}"></i> {{ $feature['label'] }}
                    </label>
                @endforeach
            </div>
        </form>
    </div>

    <div class="offcanvas-footer mt-auto pb-3">
        <button type="submit" class="btn btn-primary w-100 mb-3" form="updateVehicleForm">Atualizar</button>
        <button type="button" class="btn w-100 border-dark" data-bs-dismiss="offcanvas">Cancelar</button>
    </div>
</div>


@push('scripts')
<script>

    document.querySelectorAll('.btn-edit').forEach(btn => {
    btn.addEventListener('click', function () {
            const id   = this.dataset.id;

            console.log(id);
            
            const form = document.getElementById('updateVehicleForm');
            form.action = `/home/vehicles/${id}`; // ou usando route() via Blade se quiser
            document.getElementById('update_vehicle_id').value = id;
    
            document.getElementById('update_identification_name').value = this.dataset.identification_name || '';
            document.getElementById('update_plate').value = this.dataset.plate || '';
            document.getElementById('update_model').value = this.dataset.model || '';
            document.getElementById('update_bench').value = this.dataset.bench || '';
            document.getElementById('update_chassi').value = this.dataset.chassi || '';
            document.getElementById('update_capacity').value = this.dataset.capacity || '';
            document.getElementById('update_bus_type').value = this.dataset.bus_type || '';
            document.getElementById('update_year').value = this.dataset.year || '';

            const features = ['internet','wc','socket','air_conditioning','fridge','heating','video'];
            features.forEach(f => {
                const checkbox = document.getElementById(`update_${f}`);
                checkbox.checked = this.dataset[f] === '1';
            });
        });
    });

    </script>
@endpush
