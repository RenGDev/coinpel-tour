<div class="card border-0 d-flex flex-row py-2 px-3 shadow-sm" style="width: 33.5rem">
    <div class="card-body d-flex justify-content-between">
        <div class="d-flex gap-3 align-items-center">
            
            <x-avatar :src="$driver->photo ?? null" :size="60"/>
           
            <div class="d-flex flex-column">
    	        <span class="fw-bold" style="font-size: 15px;">{{ $driver->name }}</span>
    	        <span class="text-muted text-truncate" style="font-size: 15px;">{{ $driver->email }}</span>
    	    </div>
        </div>

        
    </div>
    <div class="dropdown">
            <button class="btn btn-sm bg-transparent border-0 p-0 align-self-baseline" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-three-dots fs-3 text-dark"></i>
            </button>
            <ul class="dropdown-menu border-0 dropdown-menu-start p-0">
                <li class="border mb-2 shadow-sm rounded">
                    <button 
                        class="dropdown-item rounded d-flex gap-2 btn-edit" 
                        data-bs-toggle="offcanvas" 
                        data-bs-target="#editDriverBackdrop"
                        data-id="{{ $driver->id }}"
                        data-name="{{ $driver->name }}"
                        data-email="{{ $driver->email }}"
                        data-phone="{{ $driver->phone }}"
                        data-cpf="{{ $driver->cpf }}"
                        data-rg="{{ $driver->rg }}"
                        data-bornDate="{{ $driver->bornDate }}"
                        data-registration="{{ $driver->registration }}"
                        data-cep="{{ $driver->cep }}"
                        data-address="{{ $driver->address }}"
                        data-number="{{ $driver->number }}"
                        data-city="{{ $driver->city }}"
                        data-state="{{ $driver->state }}"
                        data-photo="{{ $driver->photo ?? '' }}"
                    >
                        <i class="bi bi-pencil-square"></i> Editar motorista
                    </button>
                </li>
                <li class="border shadow-sm rounded">
                    <form action="{{ route('drivers.destroy', $driver->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="dropdown-item rounded d-flex gap-2" onclick="return confirm('Tem certeza que deseja deletar este motorista?')">
                            <i class="bi bi-trash"></i> Deletar Motorista
                        </button>
                    </form>
                </li>
            </ul>
        </div>
</div>