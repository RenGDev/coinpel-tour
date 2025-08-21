<div id="passwordModalInline" class="modal-dialog modal-dialog-centered shadow p-4 rounded" 
     style="position: absolute; top: 38%; left: 25%; transform: translateX(-50%); background-color: white; z-index: 1050; display: none; width: 60%; max-width:400px;">
    <div class="modal-content border-0">
        <div class="modal-header border-0 pb-2">
            <button type="button" class="btn-close" onclick="closePasswordModal()" aria-label="Fechar"></button>
        </div>
        <div>
            <h5 class="modal-title" style="font-size: 1rem;"> Crie uma nova senha</h5>
            <p style="font-size: .86rem;">No seu primeiro acesso é necessário trocar a senha provisória. É obrigatório que a senha tenha no mínimo 8 caracteres.</p>
        </div>   
            
        <div class="modal-body pt-0">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                
                <div class="mb-3">
                    <label for="password" class="form-label" style="font-size: .86rem;">Nova senha</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label" style="font-size: .86rem;">Confirme a senha</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
                <button type="submit" class="btn w-100 text-white" style="background-color: rgba(89, 62, 117, 1)">
                    Alterar senha
                </button>
            </form>
        </div>
    </div>
</div>
