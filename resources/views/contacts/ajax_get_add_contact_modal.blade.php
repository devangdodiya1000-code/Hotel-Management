<div class="modal fade" id="addContactModal" tabindex="-1" aria-labelledby="addContactModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addContactModalLabel">{{ $title }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addContactForm">
            @csrf
            <input type="hidden" name="contact_id" value="{{ old('contact_id', $contact->id ?? '')}}">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $contact->name ?? '')}}" placeholder="Please Enter The Name">
                    <span class="text-danger error-text name_error"></span>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ old('name', $contact->email ?? '')}}" placeholder="Please Enter The Email">
                    <span class="text-danger error-text email_error"></span>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" id="description" value="{{ old('name', $contact->description ?? '')}}" placeholder="Please Enter The Description">
                    <span class="text-danger error-text description_error"></span>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Message</label>
                    <input type="text" name="message" class="form-control" id="message" value="{{ old('name', $contact->message ?? '')}}" placeholder="Please Enter The Message">
                    <span class="text-danger error-text message_error"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
