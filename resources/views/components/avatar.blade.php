<img src="{{ $src ? asset('storage/' . $src) : asset('images/user-icon.png') }}" 
     alt="Avatar do Usuário" 
     class="rounded-circle border border-secondary shadow-sm" 
     style="object-fit: contain;"
     width="{{ $size ?? 50 }}" 
     height="{{ $size ?? 50 }}"
>