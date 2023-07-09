<div>
    <div class="modal fade " id="sendEmailModal" tabindex="-1" aria-labelledby="sendEmailLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="sendEmailLabel">New Email</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent=''>
                    @csrf
                    <div class="modal-body pl-4 pr-4">
                        <div class="form-group mb-4">
                            <label class="fw-bold mb-0" for="">Form</label>
                            <input type="text" name="email-from" placeholder="Enter Email" class="form-control"
                                value="{{ Auth::user()->email }}">
                            @error('email-from')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="fw-bold mb-0" for="">Name</label>
                            <input type="text" name="name" placeholder="Enter Name" class="form-control"
                                value="{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="fw-bold mb-0" for="">To</label>
                            <input type="text" name="email-to" placeholder="Enter Email" class="form-control"
                                wire:model='email' value="{{ $user->email }}">
                            @error('email-to')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="fw-bold mb-0" for="">Subject</label>
                            <input type="text" name="subject" placeholder="Enter Subject" class="form-control">
                            @error('subject')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="fw-bold mb-0" for="">Message</label>
                            <textarea type="text" name="message" placeholder="Enter username" class="form-control" cols="1" rows="8"></textarea>
                            @error('message')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success send-email-btn">SEND</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script></script>
    @endpush

</div>
