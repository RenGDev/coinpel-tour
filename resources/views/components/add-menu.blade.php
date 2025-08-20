<div class="offcanvas offcanvas-end px-3 py-2" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
  <div class="offcanvas-header justify-content-center">
    <button type="button" class="border-0 ms-4 d-inline-block bg-transparent position-absolute start-0 me-3" data-bs-dismiss="offcanvas" aria-label="Close">
      <i class="bi bi-x fs-3 text-muted"></i>
    </button>

    <h5 class="offcanvas-title text-center w-100" id="staticBackdropLabel">
        @yield('menu-title')
    </h5>

    <button type="button" class="border-0 ms-4 d-inline-block bg-transparent position-absolute end-0 me-3">
      <i class="bi bi-trash fs-5 text-muted"></i>
    </button>
  </div>

  <div class="offcanvas-body d-flex flex-column">
        
        @yield('form-content')
   
  </div>

  <div class="offcanvas-footer mt-auto pb-3">
    <button class="btn btn-primary w-100 mb-3" style="background-color: rgba(89, 62, 117, 1)" type="submit" form="registerForm">
      Finalizar Cadastro
    </button>
    <button class="btn w-100 border-dark" type="button">
      Cancelar
    </button>
  </div>
</div>
