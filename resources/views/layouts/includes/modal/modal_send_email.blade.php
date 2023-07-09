<div class="modal fade" id="sendEmailModal" tabindex="-1" aria-labelledby="sendEmailLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="sendEmailLabel">New Email</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST">
                <div class="modal-body pl-4 pr-4">
                    <div class="form-group mb-4">
                        <label class="fw-bold mb-0" for="">Form</label>
                        <input type="text" name="email-form" placeholder="Enter Email"
                            value="{{ Auth::user()->role_as == '1' ? Auth::user()->email : '' }}" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label class="fw-bold mb-0" for="">To</label>
                        <input type="text" name="email-to" placeholder="Enter Email" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label class="fw-bold mb-0" for="">Name</label>
                        <input type="text" name="name" placeholder="Enter Name" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label class="fw-bold mb-0" for="">Title</label>
                        <input type="text" name="title" placeholder="Enter Title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="fw-bold mb-0" for="">Message</label>
                        <textarea type="text" name="username" placeholder="Enter username" class="form-control" cols="1"
                            rows="5"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">SEND</button>
                </div>
            </form>
        </div>
    </div>
</div>
