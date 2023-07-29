<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="loginModalLabel">Login to @imers</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> 
            <form action="/forum/partials/_handlelogin.php" method="post">
            <div class="modal-body">
                
                    <div class="mb-3">
                        <label for="emailLogin" class="form-label">User Name</label>
                        <input type="text" class="form-control" id="emailLogin" name="emailLogin" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="loginPass" class="form-label">Password</label>
                        <input type="password" class="form-control" id="loginPass"  name="loginPass">
                        <div id="emailHelp" class="form-text">We'll never share your password  with anyone else.</div>

                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
               
            </div>
          
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                
            </div>
            </form>
        </div>
    </div>
</div>