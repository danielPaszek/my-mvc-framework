<form action="" method="POST" class="row g-3 align-items-center">
    <div class="row">
      <div class="mb-3 col">
        <label for="firstname" class="form-label">First Name</label>
        <input
          type="text"
          name="firstname"
          class="form-control"
          id="firstname"
        />
      </div>
      <div class="mb-3 col">
        <label for="lastname" class="form-label">Last Name</label>
        <input type="text" name="lastname" class="form-control" id="lastname" />
      </div>
    </div>
    <div class="row">
    <div class="mb-3 col">
        <label for="email" class="form-label">Email</label>
        <input
          type="text"
          name="email"
          class="form-control"
          id="email"
        />
        <div class="form-text">
          We'll never share your email with anyone else.
        </div>
    </div>
    
    <div class="row g-3 align-items-center">
      <div class="col-3">
        <label for="password" class="col-form-label">Password</label>
      </div>
      <div class="col-3">
        <input
          type="password"
          id="password"
          class="form-control"
          name="password"
        />
      </div>
      <div class="col-3 mb-3  align-items-center">
        <label id="passwordHelpInline" class="form-text  ms-1">
          Must be 8-20 characters long.
        </label>
      </div>
    </div>
    <div class="row g-3 align-items-center">
      <div class="col-3">
        <label for="passwordConfirm" class="col-form-label"
          >Confirm Password</label
        >
      </div>
      <div class="col-3">
        <input type="password" id="passwordConfirm" name="passwordConfirm" class="form-control" />
      </div>
      
    </div>
    <div class="row g-3 align-items-center">
    <div class="col-3">

    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="policy" name="policy" />
      <label class="form-check-label" for="policy">Accept our policy</label>
      </div>
    </div>
    </div>
    <div class="row justify-content-center">
    <button type="submit" style="max-width: 600px;" class="btn btn-primary">Submit</button>
    </div>
  </form>
