<div class="ticket-edit-modal category-overlay">
    <div class="category-modal">
        <div class="modal-header">
            <h5 class="modal-title">Category</h5>
            <button class="close">
                <span>×</span>
            </button>
        </div>
        <form method="post" action="{{ route('uhelp.updateTicket', $ticket->id) }}">
            @csrf
            <input type="hidden" name="id" value="{{ $ticket->id }}">
            <div class="modal-body">
                <select name="category_id" required>
                    <option label="Select Category"></option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                    @endforeach   
                </select>
            </div>
            <div class="modal-footer">
                <button class="btn-ticket" type="submit">Save</button>
            </div>
        </form> 
    </div>
</div>