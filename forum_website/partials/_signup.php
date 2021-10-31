
<!-- Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" aria-labelledby="signupmodalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupmodalLabel">Sign up to iKnoW</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="/forum_website/partials/_handlesignup.php" method="POST">
        <div class="modal-body bg-dark">
          <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label text-light">User name</label>
            <input type="text" class="form-control rounded-pill" name="username" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label text-light">Email address</label>
            <input type="email" class="form-control rounded-pill" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label text-light">Password</label>
            <input type="password" class="form-control rounded-pill"  name="password" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label text-light">Confirm Password</label>
            <input type="password" class="form-control rounded-pill "  name="cpassword" required>
          </div>
          
          <button type="submit" class="btn btn-primary btn-sm rounded-pill" name="submit">Sign Up</button>
        </div>
        <div class="modal-footer">

        </div>
      </form>

    </div>
  </div>
</div>