    <div wire:ignore.self  class="modal fade " id="sendEmailModal" tabindex="-1" aria-labelledby="sendEmailLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="sendEmailLabel">New Email</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div wire:loading class="p-2 text-center">
                    <div class="spinner-border text-success" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>

                <div wire:loading.remove class="modal-body pl-4 pr-4">
                    <form wire:submit.prevent='sendEmail()'>
                        @csrf
                        <div class="form-group mb-4">
                            <label class="fw-bold mb-0" for="">Form</label>
                            <input type="text" name="emailFrom" placeholder="Enter Email" class="form-control"
                                wire:model.defer='emailFrom' value="{{ Auth::user()->email }}">
                            @error('email-from')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="fw-bold mb-0" for="">Name</label>
                            <input type="text" name="name" placeholder="Enter Name" class="form-control"
                                wire:model.defer='name'
                                value="{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="fw-bold mb-0" for="">To</label>
                            <input type="text" name="emailTo" placeholder="Enter Email" class="form-control"
                                wire:model.defer='emailTo' value="{{ $user->email }}">
                            @error('email-to')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="fw-bold mb-0" for="">Subject</label>
                            <input type="text" name="subject" placeholder="Enter Subject" class="form-control"
                                wire:model.defer='subject'>
                            @error('subject')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="fw-bold mb-0" for="">Message</label>
                            <textarea wire:model.defer='message' name="message" placeholder="Enter username" class="form-control"
                                cols="1" rows="8"></textarea>
                            @error('message')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success send-email-btn">SEND</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
